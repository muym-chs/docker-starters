<?php

namespace Drupal\skeleton_module\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;

/**
 * Provides a 'SkeletonModuleMigrateProcessPlugin' migrate process plugin.
 *
 * @MigrateProcessPlugin(
 *  id = "skeleton_module_migrate_process_plugin"
 * )
 */
class SkeletonModuleMigrateProcessPlugin extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    // Plugin logic goes here.
  }

}
