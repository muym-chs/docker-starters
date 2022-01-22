<?php

namespace Drupal\dcg_module_mix\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the DcgCustomItemConstraint constraint.
 */
class DcgCustomItemConstraintConstraintValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate($item, Constraint $constraint) {

    $value = $item->getValue()['value'];
    // @DCG Validate the value here.
    if ($value == 'foo') {
      $this->context->addViolation($constraint->errorMessage);
    }

  }

}
