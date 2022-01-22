<?php

namespace Drupal\dcg_module_mix\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Provides a DcgCustomRawValueConstraint constraint.
 *
 * @Constraint(
 *   id = "DcgModuleMixDcgCustomRawValueConstraint",
 *   label = @Translation("DcgCustomRawValueConstraint", context = "Validation"),
 * )
 */
class DcgCustomRawValueConstraintConstraint extends Constraint {

  public $errorMessage = 'The error message.';

}
