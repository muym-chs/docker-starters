<?php

namespace Drupal\dcg_module_mix\Plugin\Filter;

use Drupal\Core\Form\FormStateInterface;
use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;

/**
 * Provides a 'DcgCustomFilterIrreversibleTransformation' filter.
 *
 * @Filter(
 *   id = "dcg_module_mix_dcgcustomfilterirreversibletransformation",
 *   title = @Translation("DcgCustomFilterIrreversibleTransformation"),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_IRREVERSIBLE,
 *   settings = {
 *     "example" = "foo",
 *   },
 *   weight = -10
 * )
 */
class Dcgcustomfilterirreversibletransformation extends FilterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form['example'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Example'),
      '#default_value' => $this->settings['example'],
      '#description' => $this->t('Description of the setting.'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {
    // @DCG Process text here.
    $example = $this->settings['example'];
    $text = str_replace($example, "<b>$example</b>", $text);
    return new FilterProcessResult($text);
  }

  /**
   * {@inheritdoc}
   */
  public function tips($long = FALSE) {
    return $this->t('Some filter tips here.');
  }

}