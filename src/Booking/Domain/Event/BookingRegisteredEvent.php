<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Event;

use Gym\Booking\Domain\Entity\BookingId;
use Gym\Booking\Domain\Entity\BookingMemberName;
use Gym\Booking\Domain\Entity\GymClassDay;
use Gym\Booking\Domain\Entity\GymClassId;
use Gym\Shared\Domain\Event\DomainEvent;
use Gym\Shared\Domain\ValueObject\OcurredOn;

class BookingRegisteredEvent extends DomainEvent
{
    public function __construct(
        public readonly BookingId $id,
        public readonly GymClassId $classId,
        public readonly BookingMemberName $memberName,
        public readonly GymClassDay $date,
        public readonly OcurredOn $occurredOn,
    ) {
    }
}
