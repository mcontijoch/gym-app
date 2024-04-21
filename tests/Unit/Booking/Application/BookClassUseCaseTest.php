<?php

namespace Tests\Unit;

use DateTime;
use Gym\Booking\Application\BookClassUseCase;
use Gym\Booking\Domain\Entity\Booking;
use Gym\Booking\Domain\Entity\GymClass;
use Gym\Booking\Domain\Entity\GymClassId;
use Gym\Booking\Domain\Repository\BookingRepository;
use Gym\Booking\Domain\Repository\ClassRepository;
use Gym\Shared\Domain\Service\DomainEventDispatcher;
use Gym\Shared\Domain\Service\UuidGenerator;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class BookClassUseCaseTest extends TestCase
{
    private BookClassUseCase $sut;
    private MockObject $classRepository;
    private MockObject $bookingRepository;
    private MockObject $uuidGenerator;
    private MockObject $domainEventDispatcher;

    public function setUp(): void
    {
        parent::setUp();

        $this->classRepository = $this->createMock(ClassRepository::class);
        $this->bookingRepository = $this->createMock(BookingRepository::class);
        $this->uuidGenerator = $this->createMock(UuidGenerator::class);
        $this->domainEventDispatcher = $this->createMock(DomainEventDispatcher::class);

        $this->sut = new BookClassUseCase(
            $this->classRepository,
            $this->bookingRepository,
            $this->uuidGenerator,
            $this->domainEventDispatcher
        );
    }

    public function test_book_a_class_successfully(): void
    {
        $classId = '853fb94a-5ba7-480b-9e14-1c0b76dfeb11';
        $bookingId = '8a64d689-a900-4244-bc28-8865a98fcdce';
        $memberName = 'John Doe';
        $date = new DateTime('2025-06-01');

        $class = GymClass::create(
            $classId,
            'Some random name',
            new DateTime('2025-05-01'),
            new DateTime('2025-07-01'),
            10
        );

        $this->classRepository
            ->expects(self::once())
            ->method('find')
            ->with(new GymClassId($classId))
            ->willReturn($class);

        $this->uuidGenerator
            ->expects(self::once())
            ->method('generate')
            ->willReturn($bookingId);

        $booking = Booking::create(
            $bookingId,
            $classId,
            $memberName,
            $date
        );

        $this->bookingRepository
            ->expects(self::once())
            ->method('save')
            ->with($class);

        $this->classRepository
            ->expects(self::once())
            ->method('save')
            ->with($class);

        $this->domainEventDispatcher
            ->expects(self::once())
            ->method('dispatch')
            ->withAnyParameters();

        $this->sut->book(
            $classId,
            $memberName,
            $date,
        );
    }
}
