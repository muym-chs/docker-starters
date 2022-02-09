<?php

namespace Drupal\ddna;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Config\TypedConfigManagerInterface;
use Drupal\Core\Config\Schema\SchemaCheckTrait;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Manages plugins for configuration translation mappers.
 */
class DrupalDnaManager extends DefaultPluginManager {

  use SchemaCheckTrait;

  /**
   * The configuration factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The typed configuration manager.
   *
   * @var \Drupal\Core\Config\TypedConfigManagerInterface
   */
  protected $typedConfigManager;

  /**
   * {@inheritdoc}
   */
  public function __construct(\Traversable $namespaces,
    CacheBackendInterface $cache_backend,
    ModuleHandlerInterface $module_handler,
    ConfigFactoryInterface $config_factory,
    TypedConfigManagerInterface $typed_config_manager
  ) {
    parent::__construct('', $namespaces, $module_handler);

    $this->configFactory = $config_factory;
    $this->typedConfigManager = $typed_config_manager;
  }

}
