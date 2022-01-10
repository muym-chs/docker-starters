<?php

namespace Drupal\skeleton_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;


  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['default_block_content_type']['#markup'] = 'Implement DefaultBlockContentType.';
    return $build;
  }
{


}
