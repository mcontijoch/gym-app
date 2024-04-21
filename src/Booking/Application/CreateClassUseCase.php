<?php

declare(strict_types=1);

namespace Gym\Booking\Application;

use DateTime;
use Gym\Booking\Domain\Entity\GymClass;
use Gym\Booking\Domain\Event\GymClassCreatedEvent;
use Gym\Booking\Domain\Repository\ClassRepository;
use Gym\Shared\Domain\Service\DomainEventDispatcher;
use Gym\Shared\Domain\Service\UuidGenerator;
use Gym\Shared\Domain\ValueObject\OcurredOn;

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
        $class = GymClass::fromPrimitives(
            $this->uuidGenerator->generate(),
            $name,
            $startDate,
            $endDate,
            $capacity
        );

        $this->repository->save($class);

        $this->dispatchEvent($class);
    }

    private function dispatchEvent(GymClass $class): void
    {
        $this->domainEventDispatcher->dispatch(
            new GymClassCreatedEvent(
                $class->id,
                $class->name,
                $class->startDate,
                $class->endDate,
                $class->capacity,
                new OcurredOn(new DateTime()),
            )
        );
    }
}
