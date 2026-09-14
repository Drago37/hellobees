<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Query\ShowCustomer;

use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class ShowCustomerQuery
{
    public function __construct(
        public Uuid $uuid,
    ) {
    }
}
