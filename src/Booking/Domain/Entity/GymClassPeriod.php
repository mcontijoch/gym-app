<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Entity;

use DateInterval;
use DatePeriod;
use DateTime;

final class GymClassPeriod
{
    private const DAY_INTERVAL = 'P1D';

    public function __construct(
        private readonly GymClassStartDate $startDate,
        private readonly GymClassEndDate $endDate,
    ) {
    }

    /**
     * @return GymClassDay[]
     */
    public function getDays(): array
    {
        $period = new DatePeriod(
            $this->startDate->value,
            new DateInterval(self::DAY_INTERVAL),
            $this->endDate->value,
        );

        return array_map(fn (DateTime $date) => new GymClassDay($date), iterator_to_array($period));
    }
}
