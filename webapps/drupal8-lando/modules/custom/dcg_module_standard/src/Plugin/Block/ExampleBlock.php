<?php

namespace Drupal\dcg_module_standard\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides an example block.
 *
 * @Block(
 *   id = "dcg_module_standard_example",
 *   admin_label = @Translation("Example"),
 *   category = @Translation("dcg_module_standard")
 * )
 */
class ExampleBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build['content'] = [
      '#markup' => $this->t('It works!'),
    ];
    return $build;
  }

}
