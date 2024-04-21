<?php

declare(strict_types=1);

namespace Gym\Shared\Domain\ValueObject;

use DateTime;

class DateValueObject
{
    public function __construct(
        public readonly DateTime $value
    ) {
    }
}
