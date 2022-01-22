<?php

namespace Drupal\dcg_module_mix\Controller;

use Drupal\Core\Access\AccessManagerInterface;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for Dcg module mix routes.
 */
class DcgModuleMixController extends ControllerBase {

  /**
   * The access manager.
   *
   * @var \Drupal\Core\Access\AccessManagerInterface
   */
  protected $accessManager;

  /**
   * The controller constructor.
   *
   * @param \Drupal\Core\Access\AccessManagerInterface $access_manager
   *   The access manager.
   */
  public function __construct(AccessManagerInterface $access_manager) {
    $this->accessManager = $access_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('access_manager')
    );
  }

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
