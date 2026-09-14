<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Query\ShowCommand;

use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\Sales\Domain\Entity\Product;

final readonly class CommandView
{
    /**
     * @param list<string> $productUuids
     */
    public function __construct(
        public string $uuid,
        public string $created,
        public string $customerUuid,
        public array $productUuids,
        public bool $payed,
    ) {
    }

    public static function fromEntity(Command $command): self
    {
        return new self(
            (string) $command->getUuid(),
            $command->getCreated()->toString(),
            (string) $command->getCustomer()->getUuid(),
            array_map(
                static fn (Product $product): string => (string) $product->getUuid(),
                $command->getProductCollection()->values(),
            ),
            $command->isPayed(),
        );
    }
}
