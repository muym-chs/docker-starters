<?php

namespace Drupal\dcg_module_mix\PageCache;

use Drupal\Core\PageCache\ResponsePolicyInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * A policy disallowing caching requests with certain cookies.
 */
class DcgResponsePolicy implements ResponsePolicyInterface {

  /**
   * {@inheritdoc}
   */
  public function check(Response $response, Request $request) {
    if ($request->cookies->get('foo')) {
      return self::DENY;
    }
  }

}
