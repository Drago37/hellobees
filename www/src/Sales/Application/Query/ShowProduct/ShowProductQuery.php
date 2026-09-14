<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Query\ShowProduct;

use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class ShowProductQuery
{
    public function __construct(
        public Uuid $uuid,
    ) {
    }
}
