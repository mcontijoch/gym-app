<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Entity;

use DateTime;
use Gym\Booking\Domain\Exception\GymClassEndDateIsLowerThanStartDateException;
use Gym\Shared\Domain\AggregateRoot;

final class GymClass extends AggregateRoot
{
    public static function fromPrimitives(
        string $id,
        string $name,
        DateTime $startDatePrimitive,
        DateTime $endDatePrimitive,
        int $capacity
    ): self {
        $startDate = new GymClassStartDate($startDatePrimitive);
        $endDate = new GymClassEndDate($endDatePrimitive);

        return new self(
            new GymClassId($id),
            new GymClassName($name),
            $startDate,
            $endDate,
            new GymClassCapacity($capacity),
            self::generateDays($startDate, $endDate)
        );
    }

    /** 
     * @var GymClassDay[] $days
     */
    private function __construct(
        public readonly GymClassId $id,
        public readonly GymClassName $name,
        public readonly GymClassStartDate $startDate,
        public readonly GymClassEndDate $endDate,
        public readonly GymClassCapacity $capacity,
        public readonly array $days,
    ) {
        if ($endDate->isGreaterThan($startDate->value)) {
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
