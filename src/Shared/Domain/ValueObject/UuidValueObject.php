<?php

declare(strict_types=1);

namespace Gym\Shared\Domain\ValueObject;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid;

class UuidValueObject
{
    public function __construct(
        public readonly string $value
    ) {
        if (!Uuid::isValid($value)) {
            throw new InvalidArgumentException(sprintf('%s is not a valid uuid.', $value));
        }
    }
}
