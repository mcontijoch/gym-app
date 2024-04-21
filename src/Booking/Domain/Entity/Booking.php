<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Entity;

use DateTime;

class Booking
{
    public static function create(
        string $id,
        string $classId,
        string $memberName,
        DateTime $date
    ): self{
        return new self(
            new BookingId($id),
            new GymClassId($classId),
            new BookingMemberName($memberName),
            new GymClassDay($date)
        );
    }

    private function __construct(
        public readonly BookingId $id,
        public readonly GymClassId $classId,
        public readonly BookingMemberName $memberName,
        public readonly GymClassDay $date
    ) {
    }
}
