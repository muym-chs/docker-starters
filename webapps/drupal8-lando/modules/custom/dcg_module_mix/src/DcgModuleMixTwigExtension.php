<?php

namespace Drupal\dcg_module_mix;

use Drupal\Core\Plugin\Context\ContextProviderInterface;

/**
 * Twig extension.
 */
class DcgModuleMixTwigExtension extends \Twig_Extension {

  /**
   * The user.current_user_context service.
   *
   * @var \Drupal\Core\Plugin\Context\ContextProviderInterface
   */
  protected $userCurrentUserContext;

  /**
   * Constructs a new DcgModuleMixTwigExtension object.
   *
   * @param \Drupal\Core\Plugin\Context\ContextProviderInterface $user_current_user_context
   *   The user.current_user_context service.
   */
  public function __construct(ContextProviderInterface $user_current_user_context) {
    $this->userCurrentUserContext = $user_current_user_context;
  }

  /**
   * {@inheritdoc}
   */
  public function getFunctions() {
    return [
      new \Twig_SimpleFunction('foo', function ($argument = NULL) {
        return 'Foo: ' . $argument;
      }),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFilters() {
    return [
      new \Twig_SimpleFilter('bar', function ($text) {
        return str_replace('bar', 'BAR', $text);
      }),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getTests() {
    return [
      new \Twig_SimpleTest('color', function ($text) {
        return preg_match('/^#(?:[0-9a-f]{3}){1,2}$/i', $text);
      }),
    ];
  }

}
