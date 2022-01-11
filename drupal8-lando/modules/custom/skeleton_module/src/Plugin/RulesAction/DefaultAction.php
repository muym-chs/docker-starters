<?php

namespace Drupal\skeleton_module\Plugin\RulesAction;

use Drupal\rules\Core\RulesActionBase;

/**
 * Provides a 'DefaultAction' action.
 *
 * @RulesAction(
 *  id = "default_action",
 *  label = @Translation("Default action"),
 *  category = @Translation("default_action"),
 *  context = {
 *     "user" = @ContextDefinition("entity:user",
 *       label = @Translation("EntityUser"),
 *       description = @Translation("EntityUser context")
 *     ),
 *  }
 * )
 */
class DefaultAction extends RulesActionBase {

  /**
   * {@inheritdoc}
   */
  public function doExecute($object = NULL) {
    // Insert code here.
  }

  /**
   * {@inheritdoc}
   */
  public function autoSaveContext() {
      // Insert code here.
      return [];
  }

}
