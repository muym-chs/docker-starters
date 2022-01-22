<?php

namespace Drupal\dcg_module_configuration_entity\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\dcg_module_configuration_entity\DcgModuleConfigurationEntityInterface;

/**
 * Defines the dcg_module_configuration_entity entity type.
 *
 * @ConfigEntityType(
 *   id = "dcg_module_configuration_entity",
 *   label = @Translation("dcg_module_configuration_entity"),
 *   label_collection = @Translation("dcg_module_configuration_entities"),
 *   label_singular = @Translation("dcg_module_configuration_entity"),
 *   label_plural = @Translation("dcg_module_configuration_entities"),
 *   label_count = @PluralTranslation(
 *     singular = "@count dcg_module_configuration_entity",
 *     plural = "@count dcg_module_configuration_entities",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\dcg_module_configuration_entity\DcgModuleConfigurationEntityListBuilder",
 *     "form" = {
 *       "add" = "Drupal\dcg_module_configuration_entity\Form\DcgModuleConfigurationEntityForm",
 *       "edit" = "Drupal\dcg_module_configuration_entity\Form\DcgModuleConfigurationEntityForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm"
 *     }
 *   },
 *   config_prefix = "dcg_module_configuration_entity",
 *   admin_permission = "administer dcg_module_configuration_entity",
 *   links = {
 *     "collection" = "/admin/structure/dcg-module-configuration-entity",
 *     "add-form" = "/admin/structure/dcg-module-configuration-entity/add",
 *     "edit-form" = "/admin/structure/dcg-module-configuration-entity/{dcg_module_configuration_entity}",
 *     "delete-form" = "/admin/structure/dcg-module-configuration-entity/{dcg_module_configuration_entity}/delete"
 *   },
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "description"
 *   }
 * )
 */
class DcgModuleConfigurationEntity extends ConfigEntityBase implements DcgModuleConfigurationEntityInterface {

  /**
   * The dcg_module_configuration_entity ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The dcg_module_configuration_entity label.
   *
   * @var string
   */
  protected $label;

  /**
   * The dcg_module_configuration_entity status.
   *
   * @var bool
   */
  protected $status;

  /**
   * The dcg_module_configuration_entity description.
   *
   * @var string
   */
  protected $description;

}
