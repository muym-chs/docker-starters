<?php

namespace Drupal\skeleton_module\Entity;

use Drupal\views\EntityViewsData;

/**
 * Provides Views data for Default content entity entities.
 */
class DefaultContentEntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Additional information for Views integration, such as table joins, can be
    // put here.
    return $data;
  }

}
