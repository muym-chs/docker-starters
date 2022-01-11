<?php

/** 
 * @file
 * Contains \Drupal\skeleton_module\Plugin\Derivative\CustomBlockDerivative.php.
 */
namespace Drupal\skeleton_module\Plugin\Derivative;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides block plugin definitions.
 *
 * @see \Drupal\skeleton_module\Plugin\Block\CustomBlockDerivative
 */
class CustomBlockDerivative extends DeriverBase implements ContainerDeriverInterface
{

  /**
   * The node storage.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $nodeStorage;  
  /**
   * Creates a new NodeBlock.
   *
   * @param \Drupal\Core\Entity\EntityStorageInterface $node_storage
   *   The node storage.
   */
  public function __construct(EntityStorageInterface $node_storage) 
  {
    $this->nodeStorage = $node_storage;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, $base_plugin_id) 
  {
    return new static(
      $container->get('entity.manager')->getStorage('node')
    );
  }
  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) 
  {
    $nodes = $this->nodeStorage->loadByProperties(['type' => 'article']);
    foreach ($nodes as $node) {
      $this->derivatives[$node->id()] = $base_plugin_definition;
      $this->derivatives[$node->id()]['admin_label'] = t('Node block: ') . $node->label();
    }
    return $this->derivatives;
  }

}
