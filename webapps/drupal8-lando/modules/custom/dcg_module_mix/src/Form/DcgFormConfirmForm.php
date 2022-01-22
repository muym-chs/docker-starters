<?php

namespace Drupal\dcg_module_mix\Form;

use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Provides a confirmation form before clearing out the examples.
 */
class DcgFormConfirmForm extends ConfirmFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dcg_module_mix_dcg_confirm';
  }

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to do this?');
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return new Url('system.admin_config');
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // @DCG Place your code here.
    $this->messenger()->addStatus($this->t('Done!'));
    $form_state->setRedirectUrl($this->getCancelUrl());
  }

}
