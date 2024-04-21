<?php

declare(strict_types=1);

namespace Gym\Shared\Infrastructure\Service;

use Gym\Shared\Domain\Service\UuidGenerator;
use Ramsey\Uuid\Uuid;

final class RamseyUuidGenerator implements UuidGenerator
{
    public function generate(): string
    {
        return Uuid::uuid4()->toString();
    }
}
