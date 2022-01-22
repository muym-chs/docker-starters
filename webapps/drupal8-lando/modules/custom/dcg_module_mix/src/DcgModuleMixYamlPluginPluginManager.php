<?php

namespace Drupal\dcg_module_mix;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Plugin\Discovery\YamlDiscovery;
use Drupal\Core\Plugin\Factory\ContainerFactory;

/**
 * Defines a plugin manager to deal with dcg_module_mix_yaml_plugins.
 *
 * Modules can define dcg_module_mix_yaml_plugins in a MODULE_NAME.dcg_module_mix_yaml_plugins.yml file contained
 * in the module's base directory. Each dcg_module_mix_yaml_plugin has the following structure:
 *
 * @code
 *   MACHINE_NAME:
 *     label: STRING
 *     description: STRING
 * @endcode
 *
 * @see \Drupal\dcg_module_mix\DcgModuleMixYamlPluginDefault
 * @see \Drupal\dcg_module_mix\DcgModuleMixYamlPluginInterface
 * @see plugin_api
 */
class DcgModuleMixYamlPluginPluginManager extends DefaultPluginManager {

  /**
   * {@inheritdoc}
   */
  protected $defaults = [
    // The dcg_module_mix_yaml_plugin id. Set by the plugin system based on the top-level YAML key.
    'id' => '',
    // The dcg_module_mix_yaml_plugin label.
    'label' => '',
    // The dcg_module_mix_yaml_plugin description.
    'description' => '',
    // Default plugin class.
    'class' => 'Drupal\dcg_module_mix\DcgModuleMixYamlPluginDefault',
  ];

  /**
   * Constructs DcgModuleMixYamlPluginPluginManager object.
   *
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   */
  public function __construct(ModuleHandlerInterface $module_handler, CacheBackendInterface $cache_backend) {
    $this->factory = new ContainerFactory($this);
    $this->moduleHandler = $module_handler;
    $this->alterInfo('dcg_module_mix_yaml_plugin_info');
    $this->setCacheBackend($cache_backend, 'dcg_module_mix_yaml_plugin_plugins');
  }

  /**
   * {@inheritdoc}
   */
  protected function getDiscovery() {
    if (!isset($this->discovery)) {
      $this->discovery = new YamlDiscovery('dcg_module_mix_yaml_plugins', $this->moduleHandler->getModuleDirectories());
      $this->discovery->addTranslatableProperty('label', 'label_context');
      $this->discovery->addTranslatableProperty('description', 'description_context');
    }
    return $this->discovery;
  }

}
