<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\Query\ListHarvestsByApiary;

use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class ListHarvestsByApiaryQuery
{
    public function __construct(
        public Uuid $apiaryUuid,
    ) {
    }
}
