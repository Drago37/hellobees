<?php

declare(strict_types=1);

namespace HelloBees\History\Application\Query\ListTraces;

final readonly class ListTracesQuery
{
    public function __construct(
        public ?string $beeKeeperId = null,
        public ?string $beehiveId = null,
        public ?string $apiaryId = null,
    ) {
    }
}
