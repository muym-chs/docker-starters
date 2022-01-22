<?php

namespace Drupal\dcg_module_mix\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines dcg_module_mix_annotation_plugin annotation object.
 *
 * @Annotation
 */
class DcgModuleMixAnnotationPlugin extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The human-readable name of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $title;

  /**
   * The description of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $description;

}
