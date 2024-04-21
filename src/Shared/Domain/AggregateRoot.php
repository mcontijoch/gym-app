<?php

declare(strict_types=1);

namespace Gym\Shared\Domain;

use Gym\Shared\Domain\Event\DomainEvent;

abstract class AggregateRoot
{
    /**
     * @var DomainEvent[] $domainEvents
     */
    public array $domainEvents = [];

    public function registerDomainEvent(DomainEvent $event): void
    {
        $this->domainEvents[] = $event;
    }

    public function pullDomainEvents(): array
    {
        $domainEvents = $this->domainEvents;

        $this->domainEvents = [];
        
        return $domainEvents;
    }
}
