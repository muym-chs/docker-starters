<?php

namespace Drupal\skeleton_module\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
use Drupal\Core\Config\ConfigManagerInterface;

/**
 * Class DefaultSubscriber.
 */
class DefaultSubscriber implements EventSubscriberInterface {

  /**
   * Drupal\Core\Config\ConfigManagerInterface definition.
   *
   * @var \Drupal\Core\Config\ConfigManagerInterface
   */
  protected $configManager;

  /**
   * Constructs a new DefaultSubscriber object.
   */
  public function __construct(ConfigManagerInterface $config_manager) {
    $this->configManager = $config_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events['kernel.response'] = ['onKernelResponse'];

    return $events;
  }

  /**
   * This method is called when the kernel.response is dispatched.
   *
   * @param \Symfony\Component\EventDispatcher\Event $event
   *   The dispatched event.
   */
  public function onKernelResponse(Event $event) {
    \Drupal::messenger()->addMessage('Event kernel.response thrown by Subscriber in module skeleton_module.', 'status', TRUE);
  }

}
