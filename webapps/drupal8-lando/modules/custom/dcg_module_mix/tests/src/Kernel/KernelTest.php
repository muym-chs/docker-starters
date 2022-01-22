<?php

namespace Drupal\Tests\dcg_module_mix\Kernel;

use Drupal\KernelTests\KernelTestBase;

/**
 * Test description.
 *
 * @group dcg_module_mix
 */
class KernelTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  public static $modules = ['dcg_module_mix'];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    // Mock required services here.
  }

  /**
   * Test callback.
   */
  public function testSomething() {
    $result = $this->container->get('transliteration')->transliterate('Друпал');
    $this->assertEquals('Drupal', $result);
  }

}
