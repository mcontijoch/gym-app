<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Repository;

use Gym\Booking\Domain\Entity\GymClass;
use Gym\Booking\Domain\Entity\GymClassId;

interface ClassRepository
{
    public function save(GymClass $class): void;

    public function find(GymClassId $classId): ?GymClass;
}
