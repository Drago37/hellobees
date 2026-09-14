<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Command\RemoveProduct;

use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class RemoveProductCommand
{
    public function __construct(
        public Uuid $uuid,
    ) {
    }
}
