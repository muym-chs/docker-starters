<?php

namespace Drupal\dcg_module_content_entity;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of dcg_module_content_entity type entities.
 *
 * @see \Drupal\dcg_module_content_entity\Entity\DcgModuleContentEntityType
 */
class DcgModuleContentEntityTypeListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['title'] = $this->t('Label');

    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    $row['title'] = [
      'data' => $entity->label(),
      'class' => ['menu-label'],
    ];

    return $row + parent::buildRow($entity);
  }

  /**
   * {@inheritdoc}
   */
  public function render() {
    $build = parent::render();

    $build['table']['#empty'] = $this->t(
      'No dcg_module_content_entity types available. <a href=":link">Add dcg_module_content_entity type</a>.',
      [':link' => Url::fromRoute('entity.dcg_module_content_entity_type.add_form')->toString()]
    );

    return $build;
  }

}
