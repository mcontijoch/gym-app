<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Exception;

use Gym\Booking\Domain\Entity\GymClassName;
use Gym\Shared\Domain\Exception\GymDomainException;

class ThereIsAClassAtTheSameTimeException extends GymDomainException
{
    public function __construct(GymClassName $name)
    {
        parent::__construct(sprintf('Unable to create a class, there is a %s class at the same time', $name->value));
    }
}
