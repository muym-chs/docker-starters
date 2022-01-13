<?php

namespace Drupal\skeleton_module\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Example plugin item annotation object.
 *
 * @see \Drupal\skeleton_module\Plugin\ExamplePluginManager
 * @see plugin_api
 *
 * @Annotation
 */
class ExamplePlugin extends Plugin {


  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

}
