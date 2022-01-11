<?php

namespace Drupal\skeleton_module\Plugin\QueueWorker;

use Drupal\Core\Queue\QueueWorkerBase;

/**
 * Plugin implementation of the example_plugin_id queueworker.
 *
 * @QueueWorker (
 *   id = "example_plugin_id",
 *   title = @Translation("Queue description."),
 *   cron = {"time" = 30}
 * )
 */
class ExampleQueue extends QueueWorkerBase {

  /**
   * {@inheritdoc}
   */
  public function processItem($data) {
    // Process item operations.
  }

}
