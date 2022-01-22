<?php

namespace Drupal\dcg_module_mix\Plugin\views\style;

use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\style\StylePluginBase;

/**
 * DcgCustomViewsStyle style plugin.
 *
 * @ViewsStyle(
 *   id = "dcg_module_mix_dcgcustomviewsstyle",
 *   title = @Translation("DcgCustomViewsStyle"),
 *   help = @Translation("Foo style plugin help."),
 *   theme = "views_style_dcg_module_mix_dcgcustomviewsstyle",
 *   display_types = {"normal"}
 * )
 */
class Dcgcustomviewsstyle extends StylePluginBase {

  /**
   * {@inheritdoc}
   */
  protected $usesRowPlugin = TRUE;

  /**
   * {@inheritdoc}
   */
  protected $usesRowClass = TRUE;

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    $options['wrapper_class'] = ['default' => 'item-list'];
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
    $form['wrapper_class'] = [
      '#title' => $this->t('Wrapper class'),
      '#description' => $this->t('The class to provide on the wrapper, outside rows.'),
      '#type' => 'textfield',
      '#default_value' => $this->options['wrapper_class'],
    ];
  }

}
