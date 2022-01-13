<?php

namespace Drupal\skeleton_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'DefaultPluginBlock' block.
 *
 * @Block(
 *  id = "default_plugin_block",
 *  admin_label = @Translation("Default plugin block"),
 * )
 */
class DefaultPluginBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Drupal\Core\Cache\Context\CacheContextInterface definition.
   *
   * @var \Drupal\Core\Cache\Context\CacheContextInterface
   */
  protected $cacheContextUrl;

  /**
   * Drupal\Core\Plugin\Context\ContextHandlerInterface definition.
   *
   * @var \Drupal\Core\Plugin\Context\ContextHandlerInterface
   */
  protected $contextHandler;

  /**
   * Drupal\Core\Form\FormBuilderInterface definition.
   *
   * @var \Drupal\Core\Form\FormBuilderInterface
   */
  protected $formBuilder;

  /**
   * Drupal\Core\KeyValueStore\KeyValueExpirableFactoryInterface definition.
   *
   * @var \Drupal\Core\KeyValueStore\KeyValueExpirableFactoryInterface
   */
  protected $keyvalueExpirable;

  /**
   * Symfony\Component\EventDispatcher\EventDispatcherInterface definition.
   *
   * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
   */
  protected $eventDispatcher;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $instance = new static($configuration, $plugin_id, $plugin_definition);
    $instance->cacheContextUrl = $container->get('cache_context.url');
    $instance->contextHandler = $container->get('context.handler');
    $instance->formBuilder = $container->get('form_builder');
    $instance->keyvalueExpirable = $container->get('keyvalue.expirable');
    $instance->eventDispatcher = $container->get('event_dispatcher');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'submit' => Submit button,
      'table' => Table,
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['submit'] = [
      '#type' => 'button',
      '#title' => $this->t('Submit'),
      '#description' => $this->t('Submit button'),
      '#default_value' => $this->configuration['submit'],
      '#weight' => '0',
    ];
    $form['table'] = [
      '#type' => 'table',
      '#title' => $this->t('Table'),
      '#description' => $this->t('Table description'),
      '#default_value' => $this->configuration['table'],
      '#weight' => '2',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['submit'] = $form_state->getValue('submit');
    $this->configuration['table'] = $form_state->getValue('table');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['#theme'] = 'default_plugin_block';
    $build['#conten'][] = $this->configuration['submit'];
    $build['#conten'][] = $this->configuration['table'];

    return $build;
  }

}
