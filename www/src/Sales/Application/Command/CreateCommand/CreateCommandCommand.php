<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Command\CreateCommand;

use HelloBees\Sales\Domain\Collection\ProductCollection;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class CreateCommandCommand
{
    public function __construct(
        public Uuid $customerUuid,
        public ProductCollection $productCollection,
    ) {
    }
}
