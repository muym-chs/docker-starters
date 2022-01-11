<?php

namespace Drupal\skeleton_module\Plugin\Condition;

use Drupal\Core\Condition\ConditionPluginBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\Context\ContextDefinition;

/**
 * Provides a 'Example condition' condition to enable a condition based in module selected status.
 *
 * @Condition(
 *   id = "example_condition",
 *   label = @Translation("Example condition"),
 *   context = {
 *     "user" = @ContextDefinition("entity:user", required = TRUE , label = @Translation("user"))
 *   }
 * )
 *
 */
class ExampleCondition extends ConditionPluginBase {

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $instance = parent::create($container, $configuration, $plugin_id, $plugin_definition);
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    // Sort all modules by their names.
    $modules = \Drupal::service('extension.list.module')->getList();
    uasort($modules, 'system_sort_modules_by_info_name');

    $options = [NULL => t('Select a module')];
    foreach ($modules as $module_id => $module) {
      $options[$module_id] = $module->info['name'];
    }

    $form['module'] = [
      '#type' => 'select',
      '#title' => $this->t('Select a module to validate'),
      '#default_value' => $this->configuration['module'],
      '#options' => $options,
      '#description' => $this->t('Module selected status will be use to evaluate condition.'),
    ];

    return parent::buildConfigurationForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $this->configuration['module'] = $form_state->getValue('module');
    parent::submitConfigurationForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return ['module' => ''] + parent::defaultConfiguration();
  }

  /**
   * Evaluates the condition and returns TRUE or FALSE accordingly.
   *
   * @return bool
   *   TRUE if the condition has been met, FALSE otherwise.
   */
  public function evaluate() {
    if (empty($this->configuration['module']) && !$this->isNegated()){
        return TRUE;
    }

    $module = $this->configuration['module'];
    $modules = \Drupal::service('extension.list.module')->getList();

    return $modules[$module]->status;
  }

  /**
   * Provides a human readable summary of the condition's configuration.
   */
  public function summary() {
    $module = $this->getContextValue('module');
    $modules = \Drupal::service('extension.list.module')->getList();

    $status = ($modules[$module]->status)?t('enabled'):t('disabled');

    return t('The module @module is @status.', ['@module' => $module, '@status' => $status]);
  }

}
