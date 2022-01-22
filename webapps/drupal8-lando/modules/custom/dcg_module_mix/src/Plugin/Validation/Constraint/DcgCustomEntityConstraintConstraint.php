<?php

namespace Drupal\dcg_module_mix\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Provides a DcgCustomEntityConstraint constraint.
 *
 * @Constraint(
 *   id = "DcgModuleMixDcgCustomEntityConstraint",
 *   label = @Translation("DcgCustomEntityConstraint", context = "Validation"),
 * )
 *
 * @DCG
 * To apply this constraint on a particular field implement
 * hook_entity_type_build().
 */
class DcgCustomEntityConstraintConstraint extends Constraint {

  public $errorMessage = 'The error message.';

}
