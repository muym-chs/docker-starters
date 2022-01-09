<?php

namespace Drupal\Tests\skeleton_module\FunctionalJavascript;

use Drupal\FunctionalJavascriptTests\JavascriptTestBase;

/**
 * JavaScript tests.
 *
 * @ingroup skeleton_module
 *
 * @group skeleton_module
 */
class DefaultJsTest extends JavaScriptTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = ['skeleton_module'];

  /**
   * A user with permission to administer site configuration.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $user;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->user = $this->drupalCreateUser(['administer site configuration']);
    $this->drupalLogin($this->user);
  }

  /**
   * Tests that the home page loads with a 200 response.
   */
  public function testFrontpage() {
    $this->drupalGet(Url::fromRoute('<front>'));
    $page = $this->getSession()->getPage();
    $this->assertSession()->statusCodeEquals(200);
  }

}
