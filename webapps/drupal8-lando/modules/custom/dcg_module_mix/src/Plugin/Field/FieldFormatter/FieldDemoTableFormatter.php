<?php

namespace Drupal\dcg_module_mix\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'dcg_module_mix_fielddemo_table' formatter.
 *
 * @FieldFormatter(
 *   id = "dcg_module_mix_fielddemo_table",
 *   label = @Translation("Table"),
 *   field_types = {"dcg_module_mix_fielddemo"}
 * )
 */
class FieldDemoTableFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {

    $header[] = '#';
    $header[] = $this->t('Value 1');
    $header[] = $this->t('Value 2');
    $header[] = $this->t('Value 3');

    $table = [
      '#type' => 'table',
      '#header' => $header,
    ];

    foreach ($items as $delta => $item) {
      $row = [];

      $row[]['#markup'] = $delta + 1;

      $row[]['#markup'] = $item->value_1;

      $row[]['#markup'] = $item->value_2;

      $row[]['#markup'] = $item->value_3;

      $table[$delta] = $row;
    }

    return [$table];
  }

}
