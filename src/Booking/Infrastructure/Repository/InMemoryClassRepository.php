<?php

declare(strict_types=1);

namespace Gym\Booking\Infrastructure\Repository;

use Gym\Booking\Domain\Entity\GymClass;
use Gym\Booking\Domain\Repository\ClassRepository;

class InMemoryClassRepository implements ClassRepository
{
    /**
     * @var GymClass[] $classes
     */
    private array $classes = [];

    public function save(GymClass $class): void
    {
        $classes[] = $class;
    }
}
