<?php

namespace Drupal\dcg_module_mix\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the DcgCustomRawValueConstraint constraint.
 */
class DcgCustomRawValueConstraintConstraintValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate($value, Constraint $constraint) {

    // @DCG Validate the value here.
    if ($value == 'foo') {
      $this->context->addViolation($constraint->errorMessage);
    }

  }

}
