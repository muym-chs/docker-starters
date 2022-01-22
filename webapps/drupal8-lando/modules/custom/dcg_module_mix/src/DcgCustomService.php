<?php

namespace Drupal\dcg_module_mix;

use Drupal\Core\Breadcrumb\ChainBreadcrumbBuilderInterface;

/**
 * DcgCustomService service.
 */
class DcgCustomService {

  /**
   * The breadcrumb service.
   *
   * @var \Drupal\Core\Breadcrumb\ChainBreadcrumbBuilderInterface
   */
  protected $breadcrumb;

  /**
   * Constructs a DcgCustomService object.
   *
   * @param \Drupal\Core\Breadcrumb\ChainBreadcrumbBuilderInterface $breadcrumb
   *   The breadcrumb service.
   */
  public function __construct(ChainBreadcrumbBuilderInterface $breadcrumb) {
    $this->breadcrumb = $breadcrumb;
  }

  /**
   * Method description.
   */
  public function doSomething() {
    // @DCG place your code here.
  }

}
