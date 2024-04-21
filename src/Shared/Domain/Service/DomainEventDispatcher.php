<?php

declare(strict_types=1);

namespace Gym\Shared\Domain\Service;

use Gym\Shared\Domain\Event\DomainEvent;

interface DomainEventDispatcher
{
    public function dispatch(DomainEvent $event): void;
}
