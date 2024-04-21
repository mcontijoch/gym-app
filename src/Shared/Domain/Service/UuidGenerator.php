<?php

declare(strict_types=1);

namespace Gym\Shared\Domain\Service;

interface UuidGenerator
{
    public function generate(): string;
}
