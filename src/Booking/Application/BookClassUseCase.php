<?php

declare(strict_types=1);

namespace Gym\Booking\Application;

use DateTime;
use Gym\Booking\Domain\Entity\Booking;
use Gym\Booking\Domain\Entity\GymClassId;
use Gym\Booking\Domain\Exception\GymClassNotFoundException;
use Gym\Booking\Domain\Repository\BookingRepository;
use Gym\Booking\Domain\Repository\ClassRepository;
use Gym\Shared\Domain\Service\DomainEventDispatcher;
use Gym\Shared\Domain\Service\UuidGenerator;

class BookClassUseCase
{
    public function __construct(
        private ClassRepository $classRepository,
        private BookingRepository $bookingRepository,
        private UuidGenerator $uuidGenerator,
        private DomainEventDispatcher $domainEventDispatcher
    ) {
    }

    public function book(
        string $classId,
        string $memberName,
        DateTime $date
    ): void {
        $classId = new GymClassId($classId);
        $class = $this->classRepository->find($classId);
        if ($class === null) {
            throw new GymClassNotFoundException($classId);
        }

        $booking = Booking::create(
            $this->uuidGenerator->generate(),
            $classId->value,
            $memberName,
            $date
        );

        $class->addBooking($booking);

        $this->bookingRepository->save($booking);

        $this->classRepository->save($class);

        $this->domainEventDispatcher->dispatch($class->pullDomainEvents());
    }
}
