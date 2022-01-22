<?php

namespace Drupal\dcg_module_mix;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Plugin\Discovery\HookDiscovery;
use Drupal\Core\Plugin\Factory\ContainerFactory;

/**
 * Defines a plugin manager to deal with dcg_module_mixs.
 *
 * @see \Drupal\dcg_module_mix\DcgModuleMixDefault
 * @see \Drupal\dcg_module_mix\DcgModuleMixInterface
 * @see plugin_api
 */
class DcgModuleMixPluginManager extends DefaultPluginManager {

  /**
   * {@inheritdoc}
   */
  protected $defaults = [
    // The dcg_module_mix id. Set by the plugin system based on the array key.
    'id' => '',
    // The dcg_module_mix label.
    'label' => '',
    // The dcg_module_mix description.
    'description' => '',
    // Default plugin class.
    'class' => 'Drupal\dcg_module_mix\DcgModuleMixDefault',
  ];

  /**
   * Constructs DcgModuleMixPluginManager object.
   *
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   */
  public function __construct(ModuleHandlerInterface $module_handler, CacheBackendInterface $cache_backend) {
    $this->factory = new ContainerFactory($this);
    $this->moduleHandler = $module_handler;
    $this->alterInfo('dcg_module_mix_info');
    $this->setCacheBackend($cache_backend, 'dcg_module_mix_plugins');
  }

  /**
   * {@inheritdoc}
   */
  protected function getDiscovery() {
    if (!isset($this->discovery)) {
      $this->discovery = new HookDiscovery($this->moduleHandler, 'dcg_module_mix_info');
    }
    return $this->discovery;
  }

}
