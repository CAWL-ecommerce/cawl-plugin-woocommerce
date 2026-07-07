<?php

declare (strict_types=1);
namespace Cawl\Vendor\Dhii\Package\Version\Constraint\Exception;

use Cawl\Vendor\Dhii\Validation\Exception\ValidationFailedExceptionInterface;
/**
 * Represents a case when a version does not match a constraint.
 */
interface ConstraintFailedExceptionInterface extends ValidationFailedExceptionInterface
{
}
