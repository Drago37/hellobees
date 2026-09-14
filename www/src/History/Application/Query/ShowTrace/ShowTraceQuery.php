<?php

declare(strict_types=1);

namespace HelloBees\History\Application\Query\ShowTrace;

use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class ShowTraceQuery
{
    public function __construct(
        public Uuid $uuid,
    ) {
    }
}
