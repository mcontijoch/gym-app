<?php

declare(strict_types=1);

namespace Gym\Booking\Application;

use DateTime;
use Gym\Booking\Domain\Entity\GymClass;
use Gym\Booking\Domain\Repository\ClassRepository;
use Gym\Shared\Domain\Service\DomainEventDispatcher;
use Gym\Shared\Domain\Service\UuidGenerator;

class CreateClassUseCase
{
    public function __construct(
        private ClassRepository $repository,
        private UuidGenerator $uuidGenerator,
        private DomainEventDispatcher $domainEventDispatcher
    ) {
    }

    public function create(
        string $name,
        DateTime $startDate,
        DateTime $endDate,
        int $capacity
    ): void {
        $class = GymClass::create(
            $this->uuidGenerator->generate(),
            $name,
            $startDate,
            $endDate,
            $capacity
        );

        $this->repository->save($class);

        $this->domainEventDispatcher->dispatch($class->pullDomainEvents());
    }
}
