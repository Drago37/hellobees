<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Command\PayCommand;

use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class PayCommandCommand
{
    public function __construct(
        public Uuid $uuid,
    ) {
    }
}
