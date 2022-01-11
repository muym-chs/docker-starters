<?php

namespace Drupal\skeleton_module\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates the UniqueInteger constraint.
 */
class ExampleConstraintValidator extends ConstraintValidator
{

    /**
     * {@inheritdoc}
     */
    public function validate($items, Constraint $constraint) {
        foreach ($items as $item) {
            // First check if the value is not empty.
            if (empty($item->value)) {
                // The value is empty, so a violation, aka error, is applied.
                // The type of violation applied comes from the constraint description
                // in step 1.
                $this->context->addViolation($constraint->isEmpty, ['%value' => $item->value]);
            }

            // Next check if the value is unique.
            if (!$this->isUnique($item->value)) {
                $this->context->addViolation($constraint->notUnique, ['%value' => $item->value]);
            }
        }
    }

    private function isUnique($value) {
        // Here is where the check for a unique value would happen.
    }

}
