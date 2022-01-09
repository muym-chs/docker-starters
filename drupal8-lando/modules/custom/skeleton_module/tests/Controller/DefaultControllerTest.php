<?php

namespace Drupal\skeleton_module\Tests;

use Drupal\simpletest\WebTestBase;
use Drupal\Core\Config\ConfigManagerInterface;

/**
 * Provides automated tests for the skeleton_module module.
 */
class DefaultControllerTest extends WebTestBase {

  /**
   * Drupal\Core\Config\ConfigManagerInterface definition.
   *
   * @var \Drupal\Core\Config\ConfigManagerInterface
   */
  protected $configManager;


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "skeleton_module DefaultController's controller functionality",
      'description' => 'Test Unit for module skeleton_module and controller DefaultController.',
      'group' => 'Other',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests skeleton_module functionality.
   */
  public function testDefaultController() {
    // Check that the basic functions of module skeleton_module.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
