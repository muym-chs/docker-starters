<?php

namespace Drupal\dcg_module_content_entity\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the dcg_module_content_entity type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "dcg_module_content_entity_type",
 *   label = @Translation("dcg_module_content_entity type"),
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\dcg_module_content_entity\Form\DcgModuleContentEntityTypeForm",
 *       "edit" = "Drupal\dcg_module_content_entity\Form\DcgModuleContentEntityTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "list_builder" = "Drupal\dcg_module_content_entity\DcgModuleContentEntityTypeListBuilder",
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     }
 *   },
 *   admin_permission = "administer dcg_module_content_entity types",
 *   bundle_of = "dcg_module_content_entity",
 *   config_prefix = "dcg_module_content_entity_type",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/dcg_module_content_entity_types/add",
 *     "edit-form" = "/admin/structure/dcg_module_content_entity_types/manage/{dcg_module_content_entity_type}",
 *     "delete-form" = "/admin/structure/dcg_module_content_entity_types/manage/{dcg_module_content_entity_type}/delete",
 *     "collection" = "/admin/structure/dcg_module_content_entity_types"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "uuid",
 *   }
 * )
 */
class DcgModuleContentEntityType extends ConfigEntityBundleBase {

  /**
   * The machine name of this dcg_module_content_entity type.
   *
   * @var string
   */
  protected $id;

  /**
   * The human-readable name of the dcg_module_content_entity type.
   *
   * @var string
   */
  protected $label;

}
