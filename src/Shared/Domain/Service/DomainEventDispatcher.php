<?php

declare(strict_types=1);

namespace Gym\Shared\Domain\Service;

use Gym\Shared\Domain\Event\DomainEvent;

interface DomainEventDispatcher
{
    /**
     * @var DomainEvent[] $events
     */
    public function dispatch(array $event): void;
}
