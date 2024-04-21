<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Repository;

use Gym\Booking\Domain\Entity\GymClass;

interface ClassRepository
{
    public function save(GymClass $class): void;
}
