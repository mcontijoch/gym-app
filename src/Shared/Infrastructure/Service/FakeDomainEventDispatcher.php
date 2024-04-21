<?php

declare(strict_types=1);

namespace Gym\Shared\Infrastructure\Service;

use Gym\Shared\Domain\Event\DomainEvent;
use Gym\Shared\Domain\Service\DomainEventDispatcher;

final class FakeDomainEventDispatcher implements DomainEventDispatcher
{
    public function dispatch(DomainEvent $event): void
    {

    }
}
