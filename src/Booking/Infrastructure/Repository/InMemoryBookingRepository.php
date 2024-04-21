<?php

declare(strict_types=1);

namespace Gym\Booking\Infrastructure\Repository;

use Gym\Booking\Domain\Entity\Booking;
use Gym\Booking\Domain\Repository\BookingRepository;

class InMemoryBookingRepository implements BookingRepository
{
    /**
     * @var Booking[] $bookings
     */
    private array $bookings = [];

    public function save(Booking $booking): void
    {
        $this->bookings[] = $booking;
    }
}
