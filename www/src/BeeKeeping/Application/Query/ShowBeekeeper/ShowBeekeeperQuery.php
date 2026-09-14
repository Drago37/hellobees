<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\Query\ShowBeekeeper;

use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class ShowBeekeeperQuery
{
    public function __construct(
        public Uuid $uuid,
    ) {
    }
}
