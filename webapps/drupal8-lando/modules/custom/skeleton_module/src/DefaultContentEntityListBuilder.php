<?php

namespace Drupal\skeleton_module;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Default content entity entities.
 *
 * @ingroup skeleton_module
 */
class DefaultContentEntityListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Default content entity ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var \Drupal\skeleton_module\Entity\DefaultContentEntity $entity */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.default_content_entity.edit_form',
      ['default_content_entity' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
