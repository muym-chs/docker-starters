<?php

namespace Drupal\iminify;

use Drupal\Core\File\FileSystem;
use Drupal\Core\File\FileSystemInterface;
use Drupal\Core\Path\PathMatcher;
use Drupal\Core\ProxyClass\File\MimeType\MimeTypeGuesser;
use Drupal\file\Entity\File;
use Drupal\file\FileUsage\DatabaseFileUsageBackend;

/**
 * iMinify CSS Service.
 */
class IMinifyCss {

  /**
   * The file_system service.
   *
   * @var \Drupal\Core\File\FileSystem
   */
  protected $fileSystem;

  /**
   * The file.usage service.
   *
   * @var \Drupal\file\FileUsage\DatabaseFileUsageBackend
   */
  protected $fileUsage;

  /**
   * The patch.matcher service.
   *
   * @var \Drupal\Core\Path\PathMatcher
   */
  protected $pathMatcher;

  /**
   * The file.mime_type.guesser service.
   *
   * @var \Drupal\Core\File\MimeType\MimeTypeGuesser
   */
  protected $mimeTypeGuesser;

  /**
   * Create the IMinifyCss Service.
   *
   * @param \Drupal\Core\Path\PathMatcher $pathMatcher
   *   The path.matcher service.
   * @param \Drupal\Core\File\MimeType\MimeTypeGuesser $mimeTypeGuesser
   *   The file.mime_type.guesser service.
   * @param \Drupal\file\FileUsage\DatabaseFileUsageBackend $fileUsage
   *   The file.usage service.
   * @param \Drupal\Core\File\FileSystem $fileSystem
   *   The file_system service.
   */
  public function __construct(PathMatcher $pathMatcher, MimeTypeGuesser $mimeTypeGuesser, DatabaseFileUsageBackend $fileUsage, FileSystem $fileSystem) {
    $this->pathMatcher = $pathMatcher;
    $this->mimeTypeGuesser = $mimeTypeGuesser;
    $this->fileUsage = $fileUsage;
    $this->fileSystem = $fileSystem;
  }

  /**
   * Minify a single file.
   *
   * @param object $file
   *   The file to minify.
   */
  public function minify($file, &$stats) {
    $result = $this->minifyFile($file, TRUE, $stats);

    if ($result === TRUE) {
      \Drupal::messenger()->addMessage(t('File was minified successfully.'));
    }
    else {
      \Drupal::messenger()->addMessage($result, 'error');
    }
  }

  /**
   * Scan for files.
   *
   * Recursively scan Css files within the whitelisted dirs.
   */
  public function scan(array $whitelist_include = ['core','modules','themes','libraries','profiles',], string $blacklist_regex = '') {
    if(empty($whitelist_include)) {
      return;
    }
    $existing = [];
    $new_files = [];
    $old_files = [];
    $changed_files = [];
    $existing = $this->loadAllFiles();
    foreach($whitelist_include as $dir) {
      $dir = DRUPAL_ROOT . DIRECTORY_SEPARATOR . $dir;
      if(!is_dir($dir)) {
        continue;
      }
      $directory = new \RecursiveDirectoryIterator($dir);
      $iterator = new \RecursiveIteratorIterator($directory);
      $regex = new \RegexIterator($iterator, '/(?<!\.min)\.css$/i');
      foreach ($regex as $info) {
        $new_absolute = $info->getPathname();
        $new_relative = str_replace(DRUPAL_ROOT . DIRECTORY_SEPARATOR, '', $new_absolute);
        if (!empty($blacklist_regex) && $this->pathMatcher->matchPath($new_relative, $blacklist_regex)) {
          continue;
        }
        $exists = FALSE;
        foreach ($existing as $file) {
          if ($file->uri == $new_relative) {
            if (!empty($file->minified_uri)) {
              $size = filesize($new_absolute);
              $modified = filemtime($new_absolute);
              if ($size != $file->size || $modified != $file->modified) {
                $changed_files[$new_relative] = $file;
              }
            }
            $exists = TRUE;
            $old_files[$new_relative] = TRUE;
            break;
          }
        }

        if (!$exists) {
          $new_files[$new_absolute] = TRUE;
        }
      }
    }

    foreach ($existing as $file) {
      if (!isset($old_files[$file->uri])) {
        $this->removeFile($file->uri);
      }
    }

    foreach ($changed_files as $file_uri => $file) {
      $this->removeFile($file->uri);
      $new_files[$file_uri] = TRUE;
      \Drupal::messenger()->addMessage(t('Original file %file has been modified and was restored.', ['%file' => $file_uri]));
    }

    $insert_query = \Drupal::database()->insert('iminify_assets')
      ->fields(['uri','size','modified','type']);
    $lim = 500;
    $counter = 0;
    $executed = FALSE;
    foreach ($new_files as $file => $junk) {
      $executed = FALSE;
      $insert_query->values([
        'uri' => str_replace(DRUPAL_ROOT . DIRECTORY_SEPARATOR, '', $file),
        'size' => filesize($file),
        'modified' => filemtime($file),
        'type' => 'css',
      ]);
      if($lim === $counter++) {
        $executed = $insert_query->execute();
      }
    }
    if(FALSE === $executed) {
      $insert_query->execute();
    }
    \Drupal::cache()->delete(IMINIFY_CSS_CACHE_CID);
  }

  /**
   * Load all files.
   *
   * Load all of the iminify_assets records from cache or directly from the
   * database.
   *
   * @return array
   *   The list of files.
   */
  public function loadAllFiles($type = 'css') {
    if ($cache = \Drupal::cache()->get(IMINIFY_CSS_CACHE_CID)) {
      return $cache->data;
    }
    $result = \Drupal::database()->select('iminify_assets', 'f')
      ->fields('f')
      ->condition('type',$type,'=')
      ->orderBy('uri')
      ->execute();
    $files = [];
    while ($file = $result->fetchObject()) {
      $files[$file->fid] = $file;
    }
    \Drupal::cache()->set(IMINIFY_CSS_CACHE_CID, $files, strtotime('+1 day', \Drupal::time()->getRequestTime()));
    return $files;
  }

  /**
   * Minify File.
   *
   * Helper function that sends the CSS off to be minified, handles the response,
   * stores the file in the filesystem and stores the file info in the managed
   * file tables.
   *
   * @param int $fid
   *   The file ID of the file to minify.
   * @param bool $reset
   *   Reset the cache or not.
   *
   * @return mixed
   *   Success of a translated string.
   */
  public function minifyFile($fid, $reset = FALSE, &$stats, $encodesvg) {
    $files = $this->loadAllFiles();
    $file = $files[$fid];
    $css = file_get_contents(DRUPAL_ROOT . DIRECTORY_SEPARATOR . $file->uri);
    $minified = $css;
    if (strlen($css)) {
      $input_css = $css;
      $compressor = new CssCompressor();
      $compressor->keepSourceMapComment();
      $compressor->removeImportantComments();
      $compressor->setLineBreakPosition(1000);
      $compressor->setMemoryLimit('256M');
      $compressor->setMaxExecutionTime(120);
      $compressor->setPcreBacktrackLimit(3000000);
      $compressor->setPcreRecursionLimit(150000);
      $output_css = $compressor->run($input_css);
      $compressor->keepSourceMapComment(FALSE);
      $compressor->setLineBreakPosition(0);
      $output_css = $compressor->run($input_css);
      if (preg_match_all('/url\(.*?\)/i', $output_css, $matches_svg, PREG_SET_ORDER, 0)) {
        foreach ($matches_svg as $m) {
          $is_svg = strpos($m[0], '.svg');
          if (FALSE === $is_svg) {
            $stats['counta_not_svg_embedded']++;
            $stats['not_svg_embedded'][] = $m[0];
          }
          $s = $m[0];
          $c = substr_count($s, '../') + 1;
          $test_file_uri = explode('/', $file->uri, -($c));
          $test_file_uri = implode('/', $test_file_uri);
          $t = substr($s, 4, -1);
          $w = str_replace('../', '', $t);
          $w = str_replace('"', '', $w);
          $w = $test_file_uri . DIRECTORY_SEPARATOR . $w;
          if(FALSE !== $encodesvg && $is_svg) {
            if (FALSE === file_exists($w)) {
              $stats['counta_svg_failed']++;
              $stats['svg_failed'][] = $m[0];
              continue;
            }
            $f = file_get_contents($w);
            if (FALSE === $f) {
              $stats['counta_svg_failed']++;
              $stats['svg_failed'][] = $w;
              continue;
            }
            else {
              $fe = base64_encode($f);
              $w = 'data:image/svg+xml;base64,' . $fe;
              $stats['counta_svg_success']++;
              $stats['svg_success'][] = $w;
            }
          }
          $output_css = str_replace($s, 'url("' . $w . '")', $output_css);
        }
      }
      $minified = $output_css;
    }

    $minifycss_folder = 'public://iminify_css/' . dirname($file->uri);
    $result = $this->fileSystem->prepareDirectory($minifycss_folder, FileSystemInterface::CREATE_DIRECTORY | FileSystemInterface::MODIFY_PERMISSIONS);
    $file_name = str_replace('.css', '.min.css', basename($file->uri));
    $tmp_file = $this->fileSystem->getTempDirectory() . DIRECTORY_SEPARATOR . $file_name;
    $file_uri = $minifycss_folder . DIRECTORY_SEPARATOR . $file_name;
    if (file_put_contents($tmp_file, $minified) !== FALSE) {
      if (copy($tmp_file, $file_uri)) {
        if (empty($file->minified_uri)) {
          $file = File::create(
            [
              'uid' => \Drupal::currentUser()->id(),
              'uri' => $file_uri,
              'filename' => $file_name,
              'filemime' => $this->mimeTypeGuesser->guess($file->uri),
              'status' => FILE_STATUS_PERMANENT,
            ]
          );
          $file->save();
          $this->fileUsage->add($file, 'iminify', 'node', 1);
        }
        $filesize = filesize($file_uri);
        \Drupal::database()->update('iminify_assets')
          ->fields(
            [
              'minified_uri' => $file_uri,
              'minified_size' => ($filesize) ? $filesize : 0,
              'minified_modified' => \Drupal::time()->getRequestTime(),
            ]
          )
          ->condition('fid', $fid)
          ->condition('type', 'css')
          ->execute();
        unlink($tmp_file);
        if ($reset) {
          \Drupal::cache()->delete(IMINIFY_CSS_CACHE_CID);
        }
        return TRUE;
      }
      else {
        return t('Could not copy the file from the %tmp folder.', ['%tmp' => $this->fileSystem->getTempDirectory()]);
      }
    }
    else {
      return t('Could not save the file - %file', ['%file' => $this->fileSystem->getTempDirectory() . DIRECTORY_SEPARATOR . $file_name]);
    }
  }

  /**
   * Remove minified file.
   *
   * Helper function removes the file, the entry in the file_managed table and
   * sets the file status as unminified.
   *
   * @param int $fid
   *   The file id of the file remove.
   * @param bool $reset
   *   Reset the cache or not.
   *
   * @return mixed
   *   Success of a translated string.
   */
  public function removeMinifiedFile($fid, $reset = FALSE) {
    $query = \Drupal::database()->select('iminify_assets', 'm')
      ->fields('m', ['minified_uri'])
      ->condition('m.fid', $fid)
      ->condition('m.type', 'css');
    if ($query->countQuery()->execute()->fetchField() > 0) {
      $file = $query->execute()->fetchObject();
      $query = \Drupal::database()->select('file_managed', 'f')
        ->fields('f', ['fid'])
        ->condition('f.uri', $file->minified_uri);
      if ($query->countQuery()->execute()->fetchField() > 0) {
        $file = $query->execute()->fetchObject();
        $file = File::load($file->fid);
        $file->delete();
        \Drupal::database()->update('iminify_assets')
          ->fields(
            [
              'minified_uri' => '',
              'minified_size' => 0,
              'minified_modified' => 0,
            ]
          )
          ->condition('fid', $fid)
          ->condition('type', 'css')
          ->execute();
        if ($reset) {
          \Drupal::cache()->delete(IMINIFY_CSS_CACHE_CID);
        }
        return TRUE;
      }
    }
    return t('File not found. Check that the file ID is correct.');
  }

  /**
   * Remove a file.
   *
   * Helper function removes the file, the entry in the file_managed table and
   * the entry in the iminify_assets.
   *
   * @param string $file_uri
   *   The URI of the file to remove.
   *
   * @return bool
   *   The success of the operation.
   */
  protected function removeFile($file_uri) {
    $query = \Drupal::database()->select('iminify_assets', 'm')
      ->fields('m', ['fid', 'minified_uri'])
      ->condition('m.uri', $file_uri)
      ->condition('m.type', 'css');
    if ($query->countQuery()->execute()->fetchField() > 0) {
      $file = $query->execute()->fetchObject();
      if (!empty($file->minified_uri)) {
        $query = \Drupal::database()->select('file_managed', 'f')
          ->fields('f', ['fid'])
          ->condition('f.uri', $file->minified_uri);
        if ($query->countQuery()->execute()->fetchField() > 0) {
          $minified_file = $query->execute()->fetchObject();
          $minified_file = File::load($minified_file->fid);
          $minified_file->delete();
        }
      }
      \Drupal::database()->delete('iminify_assets')
        ->condition('fid', $file->fid)
        ->condition('type', 'css')
        ->execute();
      return TRUE;
    }
  }

}
