<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Repository;

use Gym\Booking\Domain\Entity\Booking;

interface BookingRepository
{
    public function save(Booking $booking): void;
}
