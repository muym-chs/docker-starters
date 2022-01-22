<?php

namespace Drupal\dcg_module_mix\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "DcgCustomCKEditor" plugin.
 *
 * @CKEditorPlugin(
 *   id = "dcg_module_mix_dcgcustomckeditor",
 *   label = @Translation("DcgCustomCKEditor"),
 *   module = "dcg_module_mix"
 * )
 */
class Dcgcustomckeditor extends CKEditorPluginBase {

  /**
   * {@inheritdoc}
   */
  public function getFile() {
    return drupal_get_path('module', 'dcg_module_mix') . '/js/plugins/dcgcustomckeditor/plugin.js';
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public function getButtons() {
    $module_path = drupal_get_path('module', 'dcg_module_mix');
    return [
      'dcgcustomckeditor' => [
        'label' => $this->t('DcgCustomCKEditor'),
        'image' => $module_path . '/js/plugins/dcgcustomckeditor/icons/dcgcustomckeditor.png',
      ],
    ];
  }

}
