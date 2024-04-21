<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Entity;

use Gym\Booking\Domain\Exception\GymClassCapacityIsTooHighException;
use Gym\Booking\Domain\Exception\GymClassCapacityIsTooLowException;

class GymClassCapacity
{
    private const MIN_ALLOWED_CAPACITY = 1;
    private const MAX_ALLOWED_CAPACITY = 35;

    public function __construct(
        public readonly int $value
    ) {
        if ($value < self::MIN_ALLOWED_CAPACITY) {
            throw new GymClassCapacityIsTooLowException(self::MIN_ALLOWED_CAPACITY);
        }

        if ($value > self::MAX_ALLOWED_CAPACITY) {
            throw new GymClassCapacityIsTooHighException(self::MIN_ALLOWED_CAPACITY);
        }
    }
}
