<?php

declare(strict_types=1);

namespace Gym\Booking\Infrastructure\Repository;

use Gym\Booking\Domain\Entity\GymClass;
use Gym\Booking\Domain\Entity\GymClassId;
use Gym\Booking\Domain\Repository\ClassRepository;

class InMemoryClassRepository implements ClassRepository
{
    /**
     * @var GymClass[] $classes
     */
    private array $classes = [];

    public function save(GymClass $class): void
    {
        $this->classes[] = $class;
    }

    public function find(GymClassId $classId): ?GymClass
    {
        $class = array_filter($this->classes, function (GymClass $class) use ($classId) {
            return $class->id->value === $classId->value;
        });

        return count($class) > 0 ? reset($class) : null;
    }
}
