<?php

namespace Drupal\skeleton_module\Entity;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityPublishedTrait;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Defines the Default content entity entity.
 *
 * @ingroup skeleton_module
 *
 * @ContentEntityType(
 *   id = "default_content_entity",
 *   label = @Translation("Default content entity"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\skeleton_module\DefaultContentEntityListBuilder",
 *     "views_data" = "Drupal\skeleton_module\Entity\DefaultContentEntityViewsData",
 *     "translation" = "Drupal\skeleton_module\DefaultContentEntityTranslationHandler",
 *
 *     "form" = {
 *       "default" = "Drupal\skeleton_module\Form\DefaultContentEntityForm",
 *       "add" = "Drupal\skeleton_module\Form\DefaultContentEntityForm",
 *       "edit" = "Drupal\skeleton_module\Form\DefaultContentEntityForm",
 *       "delete" = "Drupal\skeleton_module\Form\DefaultContentEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\skeleton_module\DefaultContentEntityHtmlRouteProvider",
 *     },
 *     "access" = "Drupal\skeleton_module\DefaultContentEntityAccessControlHandler",
 *   },
 *   base_table = "default_content_entity",
 *   data_table = "default_content_entity_field_data",
 *   translatable = TRUE,
 *   admin_permission = "administer default content entity entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "langcode" = "langcode",
 *     "published" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/default_content_entity/{default_content_entity}",
 *     "add-form" = "/admin/structure/default_content_entity/add",
 *     "edit-form" = "/admin/structure/default_content_entity/{default_content_entity}/edit",
 *     "delete-form" = "/admin/structure/default_content_entity/{default_content_entity}/delete",
 *     "collection" = "/admin/structure/default_content_entity",
 *   },
 *   field_ui_base_route = "default_content_entity.settings"
 * )
 */
class DefaultContentEntity extends ContentEntityBase implements DefaultContentEntityInterface {

  use EntityChangedTrait;
  use EntityPublishedTrait;

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    // Add the published field.
    $fields += static::publishedBaseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Default content entity entity.'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE);

    $fields['status']->setDescription(t('A boolean indicating whether the Default content entity is published.'))
      ->setDisplayOptions('form', [
        'type' => 'boolean_checkbox',
        'weight' => -3,
      ]);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));

    return $fields;
  }

}
