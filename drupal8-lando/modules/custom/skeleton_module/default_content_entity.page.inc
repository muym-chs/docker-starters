<?php

/**
 * @file
 * Contains default_content_entity.page.inc.
 *
 * Page callback for Default content entity entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Default content entity templates.
 *
 * Default template: default_content_entity.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_default_content_entity(array &$variables) {
  // Fetch DefaultContentEntity Entity Object.
  $default_content_entity = $variables['elements']['#default_content_entity'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
