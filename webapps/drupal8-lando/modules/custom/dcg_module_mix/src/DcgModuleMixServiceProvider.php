<?php

namespace Drupal\dcg_module_mix;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Defines a service provider for the Dcg module mix module.
 */
class DcgModuleMixServiceProvider extends ServiceProviderBase {

  /**
   * {@inheritdoc}
   */
  public function register(ContainerBuilder $container) {
    $container->register('dcg_module_mix.subscriber', 'Drupal\dcg_module_mix\EventSubscriber\DcgModuleMixSubscriber')
      ->addTag('event_subscriber')
      ->addArgument(new Reference('entity_type.manager'));
  }

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    $modules = $container->getParameter('container.modules');
    if (isset($modules['dblog'])) {
      // Override default DB logger to exclude some unwanted log messages.
      $container->getDefinition('logger.dblog')
        ->setClass('Drupal\dcg_module_mix\Logger\DcgModuleMixLog');
    }
  }

}
