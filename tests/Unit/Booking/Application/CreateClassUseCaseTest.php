<?php

namespace Tests\Unit;

use DateTime;
use Gym\Booking\Application\CreateClassUseCase;
use Gym\Booking\Domain\Entity\GymClass;
use Gym\Booking\Domain\Repository\ClassRepository;
use Gym\Shared\Domain\Service\DomainEventDispatcher;
use Gym\Shared\Domain\Service\UuidGenerator;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CreateClassUseCaseTest extends TestCase
{
    private CreateClassUseCase $sut;
    private MockObject $repository;
    private MockObject $uuidGenerator;
    private MockObject $domainEventDispatcher;

    public function setUp(): void
    {
        parent::setUp();

        $this->repository = $this->createMock(ClassRepository::class);
        $this->uuidGenerator = $this->createMock(UuidGenerator::class);
        $this->domainEventDispatcher = $this->createMock(DomainEventDispatcher::class);

        $this->sut = new CreateClassUseCase(
            $this->repository,
            $this->uuidGenerator,
            $this->domainEventDispatcher
        );
    }

    public function test_create_a_class_successfully(): void
    {
        $name = 'Pilates';
        $startDate = new DateTime('2025-05-01');
        $endDate = new DateTime('2025-06-01');
        $capacity = 10;
        $classId = '853fb94a-5ba7-480b-9e14-1c0b76dfeb11';

        $this->uuidGenerator
            ->expects(self::once())
            ->method('generate')
            ->willReturn($classId);

        $class = GymClass::create(
            $classId,
            $name,
            $startDate,
            $endDate,
            $capacity
        );

        $this->repository
            ->expects(self::once())
            ->method('save')
            ->with($class);

        $this->domainEventDispatcher
            ->expects(self::once())
            ->method('dispatch')
            ->withAnyParameters();

        $this->sut->create(
            $name,
            $startDate,
            $endDate,
            $capacity
        );
    }
}
