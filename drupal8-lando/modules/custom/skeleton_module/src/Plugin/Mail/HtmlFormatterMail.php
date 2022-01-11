<?php

namespace Drupal\skeleton_module\Plugin\Mail;

use Drupal\Core\Mail\Plugin\Mail\PhpMail;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'HtmlFormatterMail' mail plugin.
 *
 * @Mail(
 *  id = "html_formatter_mail",
 *  label = @Translation("Html formatter mail")
 * )
 */
class HtmlFormatterMail extends PhpMail implements ContainerFactoryPluginInterface {

  /**
   * Drupal\Core\Authentication\AuthenticationProviderInterface definition.
   *
   * @var \Drupal\Core\Authentication\AuthenticationProviderInterface
   */
  protected $userAuthenticationCookie;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $instance = new static($configuration, $plugin_id, $plugin_definition);
    $instance->userAuthenticationCookie = $container->get('user.authentication.cookie');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  public function format(array $message) {
  }

  /**
   * {@inheritdoc}
   */
  public function mail(array $message) {
  }

}
