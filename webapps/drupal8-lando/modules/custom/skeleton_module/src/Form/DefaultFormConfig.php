<?php

namespace Drupal\skeleton_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class DefaultFormConfig.
 */
class DefaultFormConfig extends ConfigFormBase {

  /**
   * Drupal\Component\Transliteration\TransliterationInterface definition.
   *
   * @var \Drupal\Component\Transliteration\TransliterationInterface
   */
  protected $transliteration;

  /**
   * Drupal\Core\Config\ConfigManagerInterface definition.
   *
   * @var \Drupal\Core\Config\ConfigManagerInterface
   */
  protected $configManager;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $instance = parent::create($container);
    $instance->transliteration = $container->get('transliteration');
    $instance->configManager = $container->get('config.manager');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'skeleton_module.defaultformconfig',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'default_form_config';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('skeleton_module.defaultformconfig');
    $form['submit_button_config'] = [
      '#type' => 'button',
      '#title' => $this->t('Submit button config'),
      '#description' => $this->t('Submit button config'),
      '#default_value' => $config->get('submit_button_config'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('skeleton_module.defaultformconfig')
      ->set('submit_button_config', $form_state->getValue('submit_button_config'))
      ->save();
  }

}
