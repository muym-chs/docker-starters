<?php

namespace Drupal\dcg_module_standard\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for dcg_module_standard routes.
 */
class DcgModuleStandardController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
