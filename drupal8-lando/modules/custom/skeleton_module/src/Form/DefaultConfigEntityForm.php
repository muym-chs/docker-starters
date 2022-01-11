<?php

namespace Drupal\skeleton_module\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DefaultConfigEntityForm.
 */
class DefaultConfigEntityForm extends EntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $default_config_entity = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $default_config_entity->label(),
      '#description' => $this->t("Label for the Default config entity."),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $default_config_entity->id(),
      '#machine_name' => [
        'exists' => '\Drupal\skeleton_module\Entity\DefaultConfigEntity::load',
      ],
      '#disabled' => !$default_config_entity->isNew(),
    ];

    /* You will need additional form elements for your custom properties. */

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $default_config_entity = $this->entity;
    $status = $default_config_entity->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger()->addMessage($this->t('Created the %label Default config entity.', [
          '%label' => $default_config_entity->label(),
        ]));
        break;

      default:
        $this->messenger()->addMessage($this->t('Saved the %label Default config entity.', [
          '%label' => $default_config_entity->label(),
        ]));
    }
    $form_state->setRedirectUrl($default_config_entity->toUrl('collection'));
  }

}
