<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\Query\ShowHarvest;

use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class ShowHarvestQuery
{
    public function __construct(
        public Uuid $uuid,
    ) {
    }
}
