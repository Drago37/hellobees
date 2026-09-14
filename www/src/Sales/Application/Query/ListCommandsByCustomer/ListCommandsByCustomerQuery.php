<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Query\ListCommandsByCustomer;

use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class ListCommandsByCustomerQuery
{
    public function __construct(
        public Uuid $customerUuid,
    ) {
    }
}
