<?php

declare(strict_types=1);

namespace Gym\Shared\Domain\ValueObject;

class IntValueObject
{
    public function __construct(
        public readonly int $value
    ) {   
    }
}
