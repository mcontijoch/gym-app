<?php

namespace App\Providers;

use Gym\Booking\Domain\Repository\ClassRepository;
use Gym\Booking\Infrastructure\Repository\InMemoryClassRepository;
use Gym\Shared\Domain\Service\DomainEventDispatcher;
use Gym\Shared\Domain\Service\UuidGenerator;
use Gym\Shared\Infrastructure\Service\FakeDomainEventDispatcher;
use Gym\Shared\Infrastructure\Service\RamseyUuidGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        UuidGenerator::class => RamseyUuidGenerator::class,
        ClassRepository::class => InMemoryClassRepository::class,
        DomainEventDispatcher::class => FakeDomainEventDispatcher::class
    ];
}
