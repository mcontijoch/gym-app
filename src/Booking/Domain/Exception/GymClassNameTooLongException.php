<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Exception;

use Gym\Shared\Domain\Exception\GymDomainException;

class GymClassNameTooLongException extends GymDomainException
{
    public function __construct(int $maxCharacters)
    {
        parent::__construct(sprintf('Gym class name is too long. Maximum %d characters.', $maxCharacters));
    }
}
