<?php

namespace Drupal\skeleton_module\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Default config entity entity.
 *
 * @ConfigEntityType(
 *   id = "default_config_entity",
 *   label = @Translation("Default config entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\skeleton_module\DefaultConfigEntityListBuilder",
 *     "form" = {
 *       "add" = "Drupal\skeleton_module\Form\DefaultConfigEntityForm",
 *       "edit" = "Drupal\skeleton_module\Form\DefaultConfigEntityForm",
 *       "delete" = "Drupal\skeleton_module\Form\DefaultConfigEntityDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\skeleton_module\DefaultConfigEntityHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "default_config_entity",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/default_config_entity/{default_config_entity}",
 *     "add-form" = "/admin/structure/default_config_entity/add",
 *     "edit-form" = "/admin/structure/default_config_entity/{default_config_entity}/edit",
 *     "delete-form" = "/admin/structure/default_config_entity/{default_config_entity}/delete",
 *     "collection" = "/admin/structure/default_config_entity"
 *   }
 * )
 */
class DefaultConfigEntity extends ConfigEntityBase implements DefaultConfigEntityInterface {

  /**
   * The Default config entity ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Default config entity label.
   *
   * @var string
   */
  protected $label;

}
