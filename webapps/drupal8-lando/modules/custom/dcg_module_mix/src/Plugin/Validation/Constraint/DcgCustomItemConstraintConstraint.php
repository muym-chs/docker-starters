<?php

namespace Drupal\dcg_module_mix\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Provides a DcgCustomItemConstraint constraint.
 *
 * @Constraint(
 *   id = "DcgModuleMixDcgCustomItemConstraint",
 *   label = @Translation("DcgCustomItemConstraint", context = "Validation"),
 * )
 *
 * @DCG
 * To apply this constraint on third party field types. Implement
 * hook_field_info_alter().
 */
class DcgCustomItemConstraintConstraint extends Constraint {

  public $errorMessage = 'The error message.';

}
