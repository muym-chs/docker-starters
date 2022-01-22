<?php

namespace Drupal\dcg_module_mix;

use Drupal\Core\Plugin\PluginBase;

/**
 * Default class used for dcg_module_mix_yaml_plugins plugins.
 */
class DcgModuleMixYamlPluginDefault extends PluginBase implements DcgModuleMixYamlPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function label() {
    // The title from YAML file discovery may be a TranslatableMarkup object.
    return (string) $this->pluginDefinition['label'];
  }

}
