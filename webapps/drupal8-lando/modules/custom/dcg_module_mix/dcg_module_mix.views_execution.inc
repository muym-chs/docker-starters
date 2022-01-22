<?php

/**
 * @file
 * Provide views runtime hooks for the Dcg module mix module.
 */

/**
 * Implements hook_views_query_alter().
 */
function dcg_module_mix_views_query_alter(ViewExecutable $view, QueryPluginBase $query) {
  // (Example assuming a view with an exposed filter on node title.)
  // If the input for the title filter is a positive integer, filter against
  // node ID instead of node title.
  if ($view->id() == 'my_view' && is_numeric($view->exposed_raw_input['title']) && $view->exposed_raw_input['title'] > 0) {
    // Traverse through the 'where' part of the query.
    foreach ($query->where as &$condition_group) {
      foreach ($condition_group['conditions'] as &$condition) {
        // If this is the part of the query filtering on title, chang the
        // condition to filter on node ID.
        if ($condition['field'] == 'node.title') {
          $condition = [
            'field' => 'node.nid',
            'value' => $view->exposed_raw_input['title'],
            'operator' => '=',
          ];
        }
      }
    }
  }
}

/**
 * Implements hook_views_pre_render().
 */
function dcg_module_mix_views_pre_render(ViewExecutable $view) {
  // Scramble the order of the rows shown on this result page.
  // Note that this could be done earlier, but not later in the view execution
  // process.
  shuffle($view->result);
}

/**
 * Implements hook_views_post_render().
 */
function dcg_module_mix_views_post_render(ViewExecutable $view, &$output, CachePluginBase $cache) {
  // When using full pager, disable any time-based caching if there are fewer
  // than 10 results.
  if ($view->pager instanceof Drupal\views\Plugin\views\pager\Full && $cache instanceof Drupal\views\Plugin\views\cache\Time && count($view->result) < 10) {
    $cache->options['results_lifespan'] = 0;
    $cache->options['output_lifespan'] = 0;
  }
}
