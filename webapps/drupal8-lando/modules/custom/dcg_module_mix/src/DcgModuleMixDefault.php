<?php

namespace Drupal\dcg_module_mix;

use Drupal\Core\Plugin\PluginBase;

/**
 * Default class used for dcg_module_mixs plugins.
 */
class DcgModuleMixDefault extends PluginBase implements DcgModuleMixInterface {

  /**
   * {@inheritdoc}
   */
  public function label() {
    // The title from hook discovery may be a TranslatableMarkup object.
    return (string) $this->pluginDefinition['label'];
  }

}
