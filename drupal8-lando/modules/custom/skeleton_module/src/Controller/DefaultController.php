<?php

namespace Drupal\skeleton_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class DefaultController.
 */
class DefaultController extends ControllerBase {

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
    $instance->configManager = $container->get('config.manager');
    return $instance;
  }

  /**
   * Page.
   *
   * @return string
   *   Return Hello string.
   */
  public function page() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: page')
    ];
  }

}
