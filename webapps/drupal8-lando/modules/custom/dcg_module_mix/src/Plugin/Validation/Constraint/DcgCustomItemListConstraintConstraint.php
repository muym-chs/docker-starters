<?php

namespace Drupal\dcg_module_mix\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Provides a DcgCustomItemListConstraint constraint.
 *
 * @Constraint(
 *   id = "DcgModuleMixDcgCustomItemListConstraint",
 *   label = @Translation("DcgCustomItemListConstraint", context = "Validation"),
 * )
 *
 * @DCG
 * To apply this constraint on third party entity types implement either
 * hook_entity_base_field_info_alter() or hook_entity_bundle_field_info_alter().
 */
class DcgCustomItemListConstraintConstraint extends Constraint {

  public $errorMessage = 'The error message.';

}
