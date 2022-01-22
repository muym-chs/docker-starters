<?php

namespace Drupal\dcg_module_mix\Cache\Context;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Cache\Context\CalculatedCacheContextInterface;
use Drupal\Core\Cache\Context\RequestStackCacheContextBase;

/**
 * Defines the ExampleCacheContext service.
 *
 * Cache context ID: 'DcgRequestStack'.
 *
 * @DCG
 * Check out the core/lib/Drupal/Core/Cache/Context directory for examples of
 * cache contexts provided by Drupal core.
 */
class DcgRequestStackCacheContext extends RequestStackCacheContextBase implements CalculatedCacheContextInterface {

  /**
   * {@inheritdoc}
   */
  public static function getLabel() {
    return t('DcgRequestStack');
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
