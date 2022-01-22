<?php

namespace Drupal\dcg_module_mix;

use Drupal\Component\Plugin\PluginBase;

/**
 * Base class for dcg_module_mix_annotation_plugin plugins.
 */
abstract class DcgModuleMixAnnotationPluginPluginBase extends PluginBase implements DcgModuleMixAnnotationPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function label() {
    // Cast the label to a string since it is a TranslatableMarkup object.
    return (string) $this->pluginDefinition['label'];
  }

}
