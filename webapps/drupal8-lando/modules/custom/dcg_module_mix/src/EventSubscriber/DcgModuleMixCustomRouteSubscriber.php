<?php

namespace Drupal\dcg_module_mix\EventSubscriber;

use Drupal\Core\Routing\RouteSubscriberBase;
use Drupal\Core\Routing\RoutingEvents;
use Symfony\Component\Routing\RouteCollection;

/**
 * Dcg module mix route subscriber.
 */
class DcgModuleMixCustomRouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    foreach ($collection->all() as $route) {
      // Hide taxonomy pages from unprivileged users.
      if (strpos($route->getPath(), '/taxonomy/term') === 0) {
        $route->setRequirement('_role', 'administrator');
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events = parent::getSubscribedEvents();

    // Use a lower priority than \Drupal\views\EventSubscriber\RouteSubscriber
    // to ensure the requirement will be added to its routes.
    $events[RoutingEvents::ALTER] = ['onAlterRoutes', -300];

    return $events;
  }

}
