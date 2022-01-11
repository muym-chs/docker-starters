<?php

namespace Drupal\skeleton_module\Plugin\migrate\source;

use Drupal\migrate\Plugin\migrate\source\SqlBase;

/**
 * Provides a 'SkeletonModuleSourcePlugin' migrate source.
 *
 * @MigrateSource(
 *  id = "skeleton_module_source_plugin",
 *  source_module = "skeleton_module"
 * )
 */
class SkeletonModuleSourcePlugin extends SqlBase {

  /**
   * {@inheritdoc}
   */
  public function query() {
    return $this->select('users', 'u')
      ->fields('u')
      ->groupBy('u.uid')
;
  }

  /**
   * {@inheritdoc}
   */
  public function fields() {
    $fields = [
      'uid' => $this->t('uid'),
    ];
    return $fields;
  }

  /**
   * {@inheritdoc}
   */
  public function getIds() {
    return [];
  }

}
