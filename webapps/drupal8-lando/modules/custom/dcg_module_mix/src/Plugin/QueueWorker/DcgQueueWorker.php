<?php

namespace Drupal\dcg_module_mix\Plugin\QueueWorker;

use Drupal\Core\Queue\QueueWorkerBase;

/**
 * Defines 'dcg_module_mix_dcgqueueworker' queue worker.
 *
 * @QueueWorker(
 *   id = "dcg_module_mix_dcgqueueworker",
 *   title = @Translation("DcgQueueWorker"),
 *   cron = {"time" = 60}
 * )
 */
class DcgQueueWorker extends QueueWorkerBase {

  /**
   * {@inheritdoc}
   */
  public function processItem($data) {
    // @todo Process data here.
  }

}
