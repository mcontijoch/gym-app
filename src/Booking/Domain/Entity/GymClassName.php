<?php

declare(strict_types=1);

namespace Gym\Booking\Domain\Entity;

use Gym\Booking\Domain\Exception\GymClassNameTooLongException;

class GymClassName
{
    private const MAX_ALLOWED_NAME_LENGHT = 255;

    public function __construct(
        public readonly string $value
    ) {        
        if (strlen($value) > self::MAX_ALLOWED_NAME_LENGHT) {
            throw new GymClassNameTooLongException(self::MAX_ALLOWED_NAME_LENGHT);
        }
    }
}
