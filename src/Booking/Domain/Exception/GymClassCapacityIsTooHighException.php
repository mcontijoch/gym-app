<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Exception;

use Gym\Shared\Domain\Exception\GymDomainException;

class GymClassCapacityIsTooHighException extends GymDomainException
{
    public function __construct(int $capacity)
    {
        parent::__construct(sprintf('Gym class capacity too high. Minimum %d', $capacity));
    }
}
