<?php

/**
 * @file
 * Contains display_server_aliases drush command.
 */

/**
 * Implements hook_drush_help().
 */
function dcg_module_mix_drush_help($section) {
  switch ($section) {
    case 'drush:display_server_aliases':
      $help = dt('Help text here.');
      return $help;
  }
}

/**
 * Implements hook_drush_command().
 */
function dcg_module_mix_drush_command() {

  $items['display_server_aliases'] = [
    'description' => 'Command description.',
    'arguments' => [
      'foo' => 'Argument description',
    ],
    'required-arguments' => TRUE,
    'options' => [
      'bar' => 'Option description',
    ],
    'bootstrap' => DRUSH_BOOTSTRAP_DRUPAL_FULL,
    'aliases' => ['dis'],
    'examples' => [
      'drush dis foo --bar' => 'It does something with this argument',
    ],
  ];

  return $items;
}

/**
 * Callback function for display_server_aliases command.
 */
function drush_dcg_module_mix_display_server_aliases($argument) {

  $option = drush_get_option('bar', 'default');
  drush_print(dt('Argument value is "@argument".', ['@argument' => $argument]));
  drush_print(dt('Option value is "@option".', ['@option' => $option]));

  drush_set_error(dt('Error text here.'));
  drush_log(dt('Log text here'));

}
