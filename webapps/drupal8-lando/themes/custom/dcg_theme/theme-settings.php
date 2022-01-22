<?php

/**
 * @file
 * Theme settings form for dcg_theme theme.
 */

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function dcg_theme_form_system_theme_settings_alter(&$form, &$form_state) {

  $form['dcg_theme'] = [
    '#type' => 'details',
    '#title' => t('dcg_theme'),
    '#open' => TRUE,
  ];

  $form['dcg_theme']['font_size'] = [
    '#type' => 'number',
    '#title' => t('Font size'),
    '#min' => 12,
    '#max' => 18,
    '#default_value' => theme_get_setting('font_size'),
  ];

}
