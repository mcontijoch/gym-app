<?php

declare(strict_types=1);

namespace Gym\Booking\Application;

use DateTime;
use Gym\Booking\Domain\Repository\ClassRepository;
use Gym\Shared\Domain\Service\DomainEventDispatcher;
use Gym\Shared\Domain\Service\UuidGenerator;

class BookClassUseCase
{
    public function __construct(
        private ClassRepository $repository,
        private UuidGenerator $uuidGenerator,
        private DomainEventDispatcher $domainEventDispatcher
    ) {
    }

    public function book(
        string $classId,
        string $memeberName,
        DateTime $date
    ): void
    {
        
    }
}
