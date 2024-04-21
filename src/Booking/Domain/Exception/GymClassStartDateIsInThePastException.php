<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Exception;

use Gym\Shared\Domain\Exception\GymDomainException;

class GymClassStartDateIsInThePastException extends GymDomainException
{
    public function __construct()
    {
        parent::__construct('Gym class start date must be in the future.');
    }
}
