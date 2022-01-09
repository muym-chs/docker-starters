<?php

namespace Drupal\skeleton_module\CacheContext;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Cache\Context\CacheContextInterface;
use Drupal\Core\Config\ConfigManagerInterface;

/**
 * Class DefaultCacheContext.
 */
class DefaultCacheContext implements CacheContextInterface {

  /**
   * Drupal\Core\Config\ConfigManagerInterface definition.
   *
   * @var \Drupal\Core\Config\ConfigManagerInterface
   */
  protected $configManager;


  /**
   * Constructs a new DefaultCacheContext object.
   */
  public function __construct(ConfigManagerInterface $config_manager) {
    $this->configManager = $config_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function getLabel() {
    \Drupal::messenger()->addMessage('Lable of cache context');
  }

  /**
   * {@inheritdoc}
   */
  public function getContext() {
    // Actual logic of context variation will lie here.
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheableMetadata() {
    return new CacheableMetadata();
  }

}
