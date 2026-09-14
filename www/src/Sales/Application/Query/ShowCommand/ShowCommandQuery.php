<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Query\ShowCommand;

use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class ShowCommandQuery
{
    public function __construct(
        public Uuid $uuid,
    ) {
    }
}
