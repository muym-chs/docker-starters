<?php

namespace Drupal\dcg_module_mix\Plugin\EntityReferenceSelection;

use Drupal\Core\Form\FormStateInterface;
use Drupal\user\Plugin\EntityReferenceSelection\UserSelection;

/**
 * Plugin description.
 *
 * @EntityReferenceSelection(
 *   id = "dcg_module_mix_advanced_user_selection",
 *   label = @Translation("Advanced user selection"),
 *   group = "dcg_module_mix_advanced_user_selection",
 *   entity_types = {"user"},
 *   weight = 0
 * )
 */
class UserSelectionEntityReferenceSelection extends UserSelection {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {

    $default_configuration = [
      'foo' => 'bar',
    ];

    return $default_configuration + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);

    $form['foo'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Foo'),
      '#default_value' => $this->configuration['foo'],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  protected function buildEntityQuery($match = NULL, $match_operator = 'CONTAINS') {
    $query = parent::buildEntityQuery($match, $match_operator);

    // @DCG
    // Here you can apply addition conditions, sorting, etc to the query.
    // Also see self::entityQueryAlter().
    $query->condition('field_example', 123);

    return $query;
  }

}
