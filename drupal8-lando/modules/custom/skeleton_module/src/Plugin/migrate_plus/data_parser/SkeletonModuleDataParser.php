<?php

namespace Drupal\skeleton_module\Plugin\migrate_plus\data_parser;

use Drupal\migrate_plus\DataParserPluginBase;

/**
* Provides a 'SkeletonModuleDataParser' data parser plugin.
*
* @DataParser(
*  id = "skeleton_module_data_parser"
*  title = @Translation("skeleton_module_data_parser")
* )
*/
class SkeletonModuleDataParser extends DataParserPluginBase {

  /**
   * {@inheritdoc}
   */
  protected function openSourceUrl($url) {
    // Plugin logic goes here.
  }

  /**
   * {@inheritdoc}
   */
  protected function fetchNextRow() {
    // Plugin logic goes here.
  }

}
