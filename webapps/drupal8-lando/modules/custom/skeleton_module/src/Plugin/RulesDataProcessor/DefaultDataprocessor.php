<?php

namespace Drupal\skeleton_module\Plugin\RulesDataProcessor;

use Drupal\Core\Plugin\PluginBase;
use Drupal\rules\Context\DataProcessorInterface;
use Drupal\rules\Engine\ExecutionStateInterface;

/**
 * Provides a 'DefaultDataprocessor' action.
 *
 * @RulesDataProcessor(
 *   id = "default_dataprocessor",
 *   label = @Translation("Default dataprocessor")
 * )
 */
class DefaultDataprocessor extends PluginBase implements DataProcessorInterface {

  /**
    * {@inheritdoc}
    */
  public function process($value, ExecutionStateInterface $rules_state) {
     // Insert code here.
  }

}
