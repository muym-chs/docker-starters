<?php

namespace Drupal\skeleton_module\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "default_ckeditor_button" plugin.
 *
 * NOTE: The plugin ID ('id' key) corresponds to the CKEditor plugin name.
 * It is the first argument of the CKEDITOR.plugins.add() function in the
 * plugin.js file.
 *
 * @CKEditorPlugin(
 *   id = "default_ckeditor_button",
 *   label = @Translation("Default ckeditor button"),
 *   module = "skeleton_module"
 * )
 */
class DefaultCKEditorButton extends CKEditorPluginBase {


  /**
   * {@inheritdoc}
   *
   * NOTE: The keys of the returned array corresponds to the CKEditor button
   * names. They are the first argument of the editor.ui.addButton() or
   * editor.ui.addRichCombo() functions in the plugin.js file.
   */
  public function getButtons() {
    // Make sure that the path to the image matches the file structure of
    // the CKEditor plugin you are implementing.
    return [
      'Default ckeditor button' => [
        'label' => t('Default ckeditor button'),
        'image' => 'modules/custom/skeleton_module/js/plugin/default_ckeditor_button/icons/Default ckeditor button.png',
      ],
    ];
  }
  /**
   * {@inheritdoc}
   */
  public function isEnabled(Editor $editor) {
  }

  /**
   * {@inheritdoc}
   */
  public function getFile() {
    // Make sure that the path to the plugin.js matches the file structure of
    // the CKEditor plugin you are implementing.
    return drupal_get_path('module', 'skeleton_module') . '/js/Plugin/default_ckeditor_button/plugin.js';
  }

  /**
   * {@inheritdoc}
   */
  public function isInternal() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function getDependencies(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return [];
  }

}
