<?php

namespace Drupal\iminify\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Settings form for the module.
 */
class SettingsForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = [];
    $form['disable_admin'] = [
      '#title' => t('Disable on admin pages.'),
      '#description' => t('Disable this module functionality on admin pages.'),
      '#type' => 'checkbox',
      '#default_value' => \Drupal::config('iminify.config')
        ->get('disable_admin'),
    ];
    $form['save'] = [
      '#type' => 'submit',
      '#value' => t('Save settings'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'iminify_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::service('config.factory')->getEditable('iminify.config')
      ->set('disable_admin', $form_state->getValue('disable_admin'))
      ->save();
    \Drupal::cache()->delete(IMINIFY_CACHE_CID);
  }

}
