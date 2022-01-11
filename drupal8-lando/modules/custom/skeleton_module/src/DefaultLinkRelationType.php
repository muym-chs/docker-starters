<?php

namespace Drupal\skeleton_module\;

use Drupal\Core\Http\LinkRelationTypeInterface;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DefaultLinkRelationType implements LinkRelationTypeInterface, ContainerFactoryPluginInterface {

  /**
   * Drupal\Component\Datetime\TimeInterface definition.
   *
   * @var \Drupal\Component\Datetime\TimeInterface
   */
  protected $datetimeTime;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $instance = new static($configuration, $plugin_id, $plugin_definition);
    $instance->datetimeTime = $container->get('datetime.time');
    return $instance;
  }

    /**
     * {@inheritdoc}
     */
    public function build() {
    $build = [];

    // Implement your logic

    return $build;
    }
  
    /**
     * {@inheritdoc}
     */
    public function isRegistered() {

    }
  
    /**
     * {@inheritdoc}
     */
    public function isExtension() {

    }
  
    /**
     * {@inheritdoc}
     */
    public function getRegisteredName() {

    }
  
    /**
     * {@inheritdoc}
     */
    public function getExtensionUri() {

    }
  
    /**
     * {@inheritdoc}
     */
    public function getDescription() {

    }
  
    /**
     * {@inheritdoc}
     */
    public function getReference() {

    }
  
    /**
     * {@inheritdoc}
     */
    public function getNotes() {

    }
  
}
