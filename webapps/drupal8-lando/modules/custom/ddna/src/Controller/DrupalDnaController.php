<?php

namespace Drupal\ddna\Controller;

use Drupal\ddna\DrupalDnaManager;
use Drupal\Core\Config\StorageInterface;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines a controller for the ddna module.
 */
class DrupalDnaController extends ControllerBase {

  /**
   * The config storage.
   *
   * @var \Drupal\Core\Config\StorageInterface
   */
  protected $configStorage;

  /**
   * The configuration Drupal DNA manager.
   *
   * @var \Drupal\ddna\DrupalDnaManager
   */
  protected $drupalDnaManager;

  /**
   * {@inheritdoc}
   */
  public function __construct(StorageInterface $storage, DrupalDnaManager $drupal_dna_manager) {
    $this->configStorage = $storage;
    $this->drupalDnaManager = $drupal_dna_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $form = new static(
      $container->get('config.storage'),
      $container->get('plugin.manager.ddna'),
      $container->get('module_handler')
    );
    return $form;
  }

  /**
   * Builds a page listing all configuration keys to inspect.
   *
   * @return array
   *   A render array representing the list.
   */
  public function overview() {
    $page['table'] = [
      '#type' => 'table',
      '#header' => [
        'name' => $this->t('Yml key'),
      ],
      '#attributes' => [
        'class' => [
          'yml-ddna-list',
        ],
      ],
    ];

    foreach ($this->configStorage->listAll() as $name) {
      $label = '<span class="table__filter--text-source">' . $name . '</span>';
      $page['table'][] = [
        'name' => ['#markup' => $label],
      ];
    }
    return $page;
  }

}
