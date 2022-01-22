<?php

namespace Drupal\dcg_module_mix\Cache\Context;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Cache\Context\CalculatedCacheContextInterface;
use Drupal\Core\Cache\Context\UserCacheContextBase;

/**
 * Defines the ExampleCacheContext service.
 *
 * Cache context ID: 'DcgUserCache'.
 *
 * @DCG
 * Check out the core/lib/Drupal/Core/Cache/Context directory for examples of
 * cache contexts provided by Drupal core.
 */
class DcgUserCacheCacheContext extends UserCacheContextBase implements CalculatedCacheContextInterface {

  /**
   * {@inheritdoc}
   */
  public static function getLabel() {
    return t('DcgUserCache');
  }

  /**
   * {@inheritdoc}
   */
  public function getContext($parameter = NULL) {
    // @DCG: Define the cache context here.
    $context = 'some_string_value';
    return $context;
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheableMetadata($parameter = NULL) {
    return new CacheableMetadata();
  }

}
