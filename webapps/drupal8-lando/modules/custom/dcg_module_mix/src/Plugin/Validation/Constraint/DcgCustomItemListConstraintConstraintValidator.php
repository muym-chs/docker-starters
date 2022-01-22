<?php

namespace Drupal\dcg_module_mix\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the DcgCustomItemListConstraint constraint.
 */
class DcgCustomItemListConstraintConstraintValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate($items, Constraint $constraint) {

    foreach ($items as $delta => $item) {
      // @DCG Validate the item here.
      if ($item->value == 'foo') {
        $this->context->buildViolation($constraint->errorMessage)
          ->atPath($delta)
          ->addViolation();
      }
    }

  }

}
