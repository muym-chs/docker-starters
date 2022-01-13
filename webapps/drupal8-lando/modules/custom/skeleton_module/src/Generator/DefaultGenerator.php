<?php

namespace Drupal\skeleton_module\Generator;

use Drupal\Console\Core\Generator\Generator;
use Drupal\Console\Core\Generator\GeneratorInterface;

/**
 * Class DefaultGenerator.
 *
 * @package Drupal\Console\Generator
 */
class DefaultGenerator extends Generator implements GeneratorInterface {

  /**
   * {@inheritdoc}
   */
  public function generate(array $parameters) {
    // Example how to render a twig template using the renderFile method
    // $this->renderFile(
    // 'path/to/file.php.twig',
    // 'path/to/file.php',
    // $parameters
    // );.
  }

}
