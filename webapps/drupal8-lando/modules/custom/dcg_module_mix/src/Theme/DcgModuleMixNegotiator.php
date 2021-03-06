<?php

namespace Drupal\dcg_module_mix\Theme;

use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Theme\ThemeNegotiatorInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Defines a theme negotiator that deals with the active theme on example page.
 */
class DcgModuleMixNegotiator implements ThemeNegotiatorInterface {

  /**
   * The request stack.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * Constructs a new DcgModuleMixNegotiator.
   *
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   The request stack used to retrieve the current request.
   */
  public function __construct(RequestStack $request_stack) {
    $this->requestStack = $request_stack;
  }

  /**
   * {@inheritdoc}
   */
  public function applies(RouteMatchInterface $route_match) {
    return $route_match->getRouteName() == 'dcg_module_mix.example';
  }

  /**
   * {@inheritdoc}
   */
  public function determineActiveTheme(RouteMatchInterface $route_match) {
    // Allow users to pass theme name through 'theme' query parameter.
    $theme = $this->requestStack->getCurrentRequest()->query->get('theme');
    if (is_string($theme)) {
      return $theme;
    }
  }

}
