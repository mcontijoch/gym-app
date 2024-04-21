<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Exception;

use Gym\Booking\Domain\Entity\GymClassId;
use Gym\Shared\Domain\Exception\GymDomainException;

class GymClassNotFoundException extends GymDomainException
{
    public function __construct(GymClassId $classId)
    {
        parent::__construct(sprintf('Gym class %d not found', $classId));
    }
}
