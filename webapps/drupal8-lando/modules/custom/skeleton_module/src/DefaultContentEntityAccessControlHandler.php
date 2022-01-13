<?php

namespace Drupal\skeleton_module;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Default content entity entity.
 *
 * @see \Drupal\skeleton_module\Entity\DefaultContentEntity.
 */
class DefaultContentEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\skeleton_module\Entity\DefaultContentEntityInterface $entity */

    switch ($operation) {

      case 'view':

        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished default content entity entities');
        }


        return AccessResult::allowedIfHasPermission($account, 'view published default content entity entities');

      case 'update':

        return AccessResult::allowedIfHasPermission($account, 'edit default content entity entities');

      case 'delete':

        return AccessResult::allowedIfHasPermission($account, 'delete default content entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add default content entity entities');
  }


}
