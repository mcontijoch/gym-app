<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Entity;

use DateTime;
use Gym\Booking\Domain\Exception\GymClassEndDateIsInThePastException;

class GymClassEndDate
{
    public function __construct(
        public readonly DateTime $value
    ) {
        if ($value <= new DateTime()) {
            throw new GymClassEndDateIsInThePastException();
        }
    }

    public function isGreaterThan(DateTime $other): bool {
        return $this->value > $other;
    }
}
