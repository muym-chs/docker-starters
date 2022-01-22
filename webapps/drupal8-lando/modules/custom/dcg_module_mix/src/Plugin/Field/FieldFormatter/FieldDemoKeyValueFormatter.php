<?php

namespace Drupal\dcg_module_mix\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;

/**
 * Plugin implementation of the 'dcg_module_mix_fielddemo_key_value' formatter.
 *
 * @FieldFormatter(
 *   id = "dcg_module_mix_fielddemo_key_value",
 *   label = @Translation("Key-value"),
 *   field_types = {"dcg_module_mix_fielddemo"}
 * )
 */
class FieldDemoKeyValueFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {

    $element = [];

    foreach ($items as $delta => $item) {

      $table = [
        '#type' => 'table',
      ];

      // Value 1.
      if ($item->value_1) {
        $table['#rows'][] = [
          'data' => [
            [
              'header' => TRUE,
              'data' => [
                '#markup' => $this->t('Value 1'),
              ],
            ],
            [
              'data' => [
                '#markup' => $item->value_1,
              ],
            ],
          ],
          'no_striping' => TRUE,
        ];
      }

      // Value 2.
      if ($item->value_2) {
        $table['#rows'][] = [
          'data' => [
            [
              'header' => TRUE,
              'data' => [
                '#markup' => $this->t('Value 2'),
              ],
            ],
            [
              'data' => [
                '#markup' => $item->value_2,
              ],
            ],
          ],
          'no_striping' => TRUE,
        ];
      }

      // Value 3.
      if ($item->value_3) {
        $table['#rows'][] = [
          'data' => [
            [
              'header' => TRUE,
              'data' => [
                '#markup' => $this->t('Value 3'),
              ],
            ],
            [
              'data' => [
                '#markup' => $item->value_3,
              ],
            ],
          ],
          'no_striping' => TRUE,
        ];
      }

      $element[$delta] = $table;

    }

    return $element;
  }

}
