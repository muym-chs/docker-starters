<?php

namespace Drupal\skeleton_module\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Plugin implementation of the 'example_constraint'.
 *
 * @Constraint(
 *   id = "example_constraint",
 *   label = @Translation("Example constraint", context = "Validation"),
 * )
 */
class ExampleConstraint extends Constraint
{

    // The message that will be shown if the value is empty.
    public $isEmpty = '%value is empty';

    // The message that will be shown if the value is not unique.
    public $notUnique = '%value is not unique';

}
