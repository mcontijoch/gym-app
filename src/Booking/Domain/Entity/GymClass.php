<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Entity;

use DateTime;
use Gym\Booking\Domain\Event\BookingRegisteredEvent;
use Gym\Booking\Domain\Event\GymClassCreatedEvent;
use Gym\Booking\Domain\Exception\GymClassEndDateIsLowerThanStartDateException;
use Gym\Shared\Domain\AggregateRoot;
use Gym\Shared\Domain\ValueObject\OcurredOn;

final class GymClass extends AggregateRoot
{
    public static function create(
        string $id,
        string $name,
        DateTime $startDatePrimitive,
        DateTime $endDatePrimitive,
        int $capacity,
        array $bookings = []
    ): self {
        $startDate = new GymClassStartDate($startDatePrimitive);
        $endDate = new GymClassEndDate($endDatePrimitive);

        $class = new self(
            new GymClassId($id),
            new GymClassName($name),
            $startDate,
            $endDate,
            new GymClassCapacity($capacity),
            self::generateDays($startDate, $endDate),
            $bookings
        );

        $class->registerDomainEvent(
            new GymClassCreatedEvent(
                $class->id,
                $class->name,
                $class->startDate,
                $class->endDate,
                $class->capacity,
                new OcurredOn(new DateTime()),
            )
        );

        return $class;
    }

    public function addBooking(Booking $booking): void
    {
        $this->bookings[] = $booking;

        $this->registerDomainEvent(
            new BookingRegisteredEvent(
                $booking->id,
                $booking->classId,
                $booking->memberName,
                $booking->date,
                new OcurredOn(new DateTime()),
            )
        );
    }

    /** 
     * @var GymClassDay[] $days
     * @var Booking[] $bookings
     */
    private function __construct(
        public readonly GymClassId $id,
        public readonly GymClassName $name,
        public readonly GymClassStartDate $startDate,
        public readonly GymClassEndDate $endDate,
        public readonly GymClassCapacity $capacity,
        public readonly array $days,
        public readonly array $bookings,
    ) {
        if ($startDate->isGreaterThan($endDate->value)) {
            throw new GymClassEndDateIsLowerThanStartDateException();
        }
    }

    /**
     * @return GymClassDay[]
     */
    private static function generateDays(GymClassStartDate $startDate, GymClassEndDate $endDate): array
    {
        $period = new GymClassPeriod($startDate, $endDate);

        return $period->getDays();
    }
}
