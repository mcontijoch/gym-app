<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Exception;

use Gym\Shared\Domain\Exception\GymDomainException;

class GymClassEndDateIsLowerThanStartDateException extends GymDomainException
{
    public function __construct()
    {
        parent::__construct('Gym class end date must be greater than start date.');
    }
}
