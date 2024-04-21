<?php

declare(strict_types=1);

namespace Gym\Shared\Domain\ValueObject;

class StringValueObject
{
    public function __construct(
        public readonly string $value
    ) {   
    }
}
