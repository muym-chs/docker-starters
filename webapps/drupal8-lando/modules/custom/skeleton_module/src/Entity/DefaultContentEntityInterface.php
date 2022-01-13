<?php

namespace Drupal\skeleton_module\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\Core\Entity\EntityPublishedInterface;

/**
 * Provides an interface for defining Default content entity entities.
 *
 * @ingroup skeleton_module
 */
interface DefaultContentEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityPublishedInterface {

  /**
   * Add get/set methods for your configuration properties here.
   */

  /**
   * Gets the Default content entity name.
   *
   * @return string
   *   Name of the Default content entity.
   */
  public function getName();

  /**
   * Sets the Default content entity name.
   *
   * @param string $name
   *   The Default content entity name.
   *
   * @return \Drupal\skeleton_module\Entity\DefaultContentEntityInterface
   *   The called Default content entity entity.
   */
  public function setName($name);

  /**
   * Gets the Default content entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Default content entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Default content entity creation timestamp.
   *
   * @param int $timestamp
   *   The Default content entity creation timestamp.
   *
   * @return \Drupal\skeleton_module\Entity\DefaultContentEntityInterface
   *   The called Default content entity entity.
   */
  public function setCreatedTime($timestamp);

}
