<?php

namespace Drupal\iminify\Commands;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\iminify\IMinifyCss;
use Drush\Commands\DrushCommands;

/**
 * A Drush commandfile.
 *
 * In addition to this file, you need a drush.services.yml
 * in root of your module, and a composer.json file that provides the name
 * of the services file to use.
 *
 * See these files for an example of injecting Drupal services:
 *   - http://cgit.drupalcode.org/devel/tree/src/Commands/DevelCommands.php
 *   - http://cgit.drupalcode.org/devel/tree/drush.services.yml
 */
class IMinifyCssCommands extends DrushCommands {

  /**
   * The cache.default service.
   *
   * @var \Drupal\Core\Cache\CacheBackendInterface
   */
  protected $cache;

  /**
   * The iminifyCss service.
   *
   * @var \Drupal\iminify\IMinifyCss
   */
  protected $iminifyCss;

  /**
   * IMinifyCssCommands constructor.
   *
   * @param \Drupal\iminify\IMinifyCss $iminifyCss
   *   The iminify service.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache
   *   The cache.default service.
   */
  public function __construct(IMinifyCss $iminifyCss, CacheBackendInterface $cache) {
    $this->iminifyCss = $iminifyCss;
    $this->cache = $cache;
  }

  /**
   * All Css files minification.
   *
   * @usage drush iminify:css
   *   Css files minification.
   *
   * @command iminify:css
   * @option svgencode Encode base64 svg from css to limit server hits
   * @aliases im:css
   */
  public function iminifyCss($options = ['svgencode' => FALSE]) {
    $this->output()->writeln('Minifying all CSS files...');
    $stats = [
      'counta_svg_success' => 0,
      'counta_svg_failed' => 0,
      'counta_not_svg_embedded' => 0,
    ];
    $files = $this->iminifyCss->loadAllFiles();
    foreach ($files as $fid => $file) {
      $status = $this->iminifyCss->minifyFile($fid, FALSE, $stats, $options['svgencode']);

      // Only output error messages.
      if ($status !== TRUE) {
        $this->output()->writeln($status);
      }
    }

    if(FALSE !== $options['svgencode']) {
      print_r($stats);
    }

    $this->cache->delete(IMINIFY_CSS_CACHE_CID);

    $this->output()->writeln('Complete!');
  }

  /**
   * Drush command to find all Css files.
   *
   * @usage drush iminify-scan:css
   *   Drush command to find all Css files.
   *
   * @command iminify-scan:css
   * @param whitelist_include Scan whitelist include directory list, divided by ','.
   * @param blacklist_regex Scan blacklist regex directory list, tested with wildcards only *name*, divided by ','.
   * @aliases imsc:css
   */
  public function scanCss($whitelist_include = 'core/,modules/,themes/,libraries/,profiles/', $blacklist_regex = '*node_modules*,*vendor*') {
    $this->output()->writeln('Scanning for CSS files...');
    $this->output()
      ->writeln('Whitelist include: \'' . $whitelist_include . '\'');
    $this->output()->writeln('Blacklist regex: \'' . $blacklist_regex . '\'');

    $this->iminifyCss->scan(explode(',', $whitelist_include), str_replace(',', "\n", $blacklist_regex));
    $this->output()->writeln('Complete!');
  }

  /**
   * Drush command to remove all minified CSS files.
   *
   * @usage drush iminify-revert:css
   *   Drush command to remove all minified Css files.
   *
   * @command iminify-revert:css
   * @aliases imr:css
   */
  public function revertCss() {
    foreach ($this->iminifyCss->loadAllFiles() as $fid => $file) {
      $this->iminifyCss->removeMinifiedFile($fid);
    }
    $this->cache->delete(IMINIFY_CSS_CACHE_CID);
    $this->output()->writeln('Complete!');
  }

  /**
   * Status Css.
   *
   * @usage drush iminify-status:css
   *   Drush command debug minified Css files.
   *
   * @command iminify-status:css
   * @option full Display full list of files
   * @aliases ims:css
   */
  public function statusCss($options = ['full' => FALSE]) {
    $files = $this->iminifyCss->loadAllFiles();
    // Statistics.
    $number_of_files = 0;
    $minified_files = 0;
    $unminified_size = 0;
    $minified_size = 0;
    $saved_size = 0;
    $session = \Drupal::service('tempstore.private')->get('iminify');
    $query = $session->get('query');
    // Filter the files based on query.
    if ($query) {
      $new_files = [];
      foreach ($files as $fid => $file) {
        if (stripos($file->uri, $query) !== FALSE) {
          $new_files[$fid] = $file;
        }
      }
      $files = $new_files;
    }

    if (!empty($files)) {
      // Statistics for all files.
      foreach ($files as $fid => $file) {
        $number_of_files++;
        $unminified_size += $file->size;
        $minified_size += $file->minified_size;
        if ($file->minified_uri) {
          $saved_size += $file->size - $file->minified_size;
          $minified_files++;
        }

        if (FALSE !== $options['full']) {
          $this->output()
            ->writeln(t("@percentage|original @file_url(@size)|original updated @modified|minified @minified_file(@minified)|modification @minified_date",
              [
                '@file_url' => $file->uri,
                '@modified' => date('Y-m-d', $file->modified),
                '@size' => format_size($file->size),
                '@minified' => ($minified_size) ? format_size($saved_size) : 0,
                '@percentage' => ($file->minified_uri && $file->minified_size > 0) ? round(($file->size - $file->minified_size) / $file->size * 100, 2) . '%' : 0 . '%',
                '@minified_date' => $file->minified_modified > 0 ? date('Y-m-d', $file->minified_modified) : '-',
                '@minified_file' => format_size($file->minified_size),
              ]));
        }
      }
    }

    // Report on statistics.
    $this->output()
      ->writeln(t(
      '@files CSS files (@min_files minified). The size of all original files is @size and the size of all of the minified files is @minified for a savings of @diff (@percent% smaller overall)',
      [
        '@files' => $number_of_files,
        '@min_files' => $minified_files,
        '@size' => format_size($unminified_size),
        '@minified' => ($minified_size) ? format_size($minified_size) : 0,
        '@diff' => ($minified_size) ? format_size($saved_size) : 0,
        '@percent' => ($minified_size) ? round($saved_size / $unminified_size * 100, 2) : 0,
      ]
    ));
  }

}
