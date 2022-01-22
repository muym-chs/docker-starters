<?php

namespace Drupal\dcg_module_content_entity;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines the access control handler for the dcg_module_content_entity entity type.
 */
class DcgModuleContentEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {

    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view dcg_module_content_entity');

      case 'update':
        return AccessResult::allowedIfHasPermissions($account, ['edit dcg_module_content_entity', 'administer dcg_module_content_entity'], 'OR');

      case 'delete':
        return AccessResult::allowedIfHasPermissions($account, ['delete dcg_module_content_entity', 'administer dcg_module_content_entity'], 'OR');

      default:
        // No opinion.
        return AccessResult::neutral();
    }

  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermissions($account, ['create dcg_module_content_entity', 'administer dcg_module_content_entity'], 'OR');
  }

}
