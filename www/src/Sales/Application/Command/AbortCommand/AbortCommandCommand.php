<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Command\AbortCommand;

use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class AbortCommandCommand
{
    public function __construct(
        public Uuid $uuid,
    ) {
    }
}
