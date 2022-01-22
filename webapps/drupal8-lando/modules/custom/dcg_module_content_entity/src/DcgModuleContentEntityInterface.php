<?php

namespace Drupal\dcg_module_content_entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a dcg_module_content_entity entity type.
 */
interface DcgModuleContentEntityInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

  /**
   * Gets the dcg_module_content_entity title.
   *
   * @return string
   *   Title of the dcg_module_content_entity.
   */
  public function getTitle();

  /**
   * Sets the dcg_module_content_entity title.
   *
   * @param string $title
   *   The dcg_module_content_entity title.
   *
   * @return \Drupal\dcg_module_content_entity\DcgModuleContentEntityInterface
   *   The called dcg_module_content_entity entity.
   */
  public function setTitle($title);

  /**
   * Gets the dcg_module_content_entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the dcg_module_content_entity.
   */
  public function getCreatedTime();

  /**
   * Sets the dcg_module_content_entity creation timestamp.
   *
   * @param int $timestamp
   *   The dcg_module_content_entity creation timestamp.
   *
   * @return \Drupal\dcg_module_content_entity\DcgModuleContentEntityInterface
   *   The called dcg_module_content_entity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the dcg_module_content_entity status.
   *
   * @return bool
   *   TRUE if the dcg_module_content_entity is enabled, FALSE otherwise.
   */
  public function isEnabled();

  /**
   * Sets the dcg_module_content_entity status.
   *
   * @param bool $status
   *   TRUE to enable this dcg_module_content_entity, FALSE to disable.
   *
   * @return \Drupal\dcg_module_content_entity\DcgModuleContentEntityInterface
   *   The called dcg_module_content_entity entity.
   */
  public function setStatus($status);

}
