<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Event;

use Gym\Booking\Domain\Entity\GymClassCapacity;
use Gym\Booking\Domain\Entity\GymClassEndDate;
use Gym\Booking\Domain\Entity\GymClassId;
use Gym\Booking\Domain\Entity\GymClassName;
use Gym\Booking\Domain\Entity\GymClassStartDate;
use Gym\Shared\Domain\Event\DomainEvent;
use Gym\Shared\Domain\ValueObject\OcurredOn;

class GymClassCreatedEvent extends DomainEvent
{
    private function __construct(
        public readonly GymClassId $id,
        public readonly GymClassName $name,
        public readonly GymClassStartDate $startDate,
        public readonly GymClassEndDate $endDate,
        public readonly GymClassCapacity $capacity,
        public readonly OcurredOn $occurredOn,
    ) {
    }
}
