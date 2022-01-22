<?php

namespace Drupal\dcg_module_mix\Plugin\Field\FieldType;

use Drupal\Component\Utility\Random;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Defines the 'dcg_module_mix_fielddemo' field type.
 *
 * @FieldType(
 *   id = "dcg_module_mix_fielddemo",
 *   label = @Translation("FieldDemo"),
 *   category = @Translation("General"),
 *   default_widget = "dcg_module_mix_fielddemo",
 *   default_formatter = "dcg_module_mix_fielddemo_default"
 * )
 */
class FieldDemoItem extends FieldItemBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultStorageSettings() {
    $settings = ['foo' => 'example'];
    return $settings + parent::defaultStorageSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function storageSettingsForm(array &$form, FormStateInterface $form_state, $has_data) {
    $settings = $this->getSettings();

    $element['foo'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Foo'),
      '#default_value' => $settings['foo'],
      '#disabled' => $has_data,
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultFieldSettings() {
    $settings = ['bar' => 'example'];
    return $settings + parent::defaultFieldSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function fieldSettingsForm(array $form, FormStateInterface $form_state) {
    $settings = $this->getSettings();

    $element['bar'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Foo'),
      '#default_value' => $settings['bar'],
    ];

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    if ($this->value_1 !== NULL) {
      return FALSE;
    }
    elseif ($this->value_2 !== NULL) {
      return FALSE;
    }
    elseif ($this->value_3 !== NULL) {
      return FALSE;
    }
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {

    $properties['value_1'] = DataDefinition::create('string')
      ->setLabel(t('Value 1'));
    $properties['value_2'] = DataDefinition::create('uri')
      ->setLabel(t('Value 2'));
    $properties['value_3'] = DataDefinition::create('string')
      ->setLabel(t('Value 3'));

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function getConstraints() {
    $constraints = parent::getConstraints();

    $options['value_1']['NotBlank'] = [];

    $constraint_manager = \Drupal::typedDataManager()->getValidationConstraintManager();
    $constraints[] = $constraint_manager->create('ComplexData', $options);
    // @todo Add more constraints here.
    return $constraints;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {

    $columns = [
      'value_1' => [
        'type' => 'varchar',
        'length' => 255,
      ],
      'value_2' => [
        'type' => 'varchar',
        'length' => 2048,
      ],
      'value_3' => [
        'type' => 'text',
        'size' => 'big',
      ],
    ];

    $schema = [
      'columns' => $columns,
      // @DCG Add indexes here if necessary.
    ];

    return $schema;
  }

  /**
   * {@inheritdoc}
   */
  public static function generateSampleValue(FieldDefinitionInterface $field_definition) {

    $random = new Random();

    $values['value_1'] = $random->word(mt_rand(1, 255));

    $tlds = ['com', 'net', 'gov', 'org', 'edu', 'biz', 'info'];
    $domain_length = mt_rand(7, 15);
    $protocol = mt_rand(0, 1) ? 'https' : 'http';
    $www = mt_rand(0, 1) ? 'www' : '';
    $domain = $random->word($domain_length);
    $tld = $tlds[mt_rand(0, (count($tlds) - 1))];
    $values['value_2'] = "$protocol://$www.$domain.$tld";

    $values['value_3'] = $random->paragraphs(5);

    return $values;
  }

}
