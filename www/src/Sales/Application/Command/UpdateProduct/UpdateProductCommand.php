<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Command\UpdateProduct;

use HelloBees\Sales\Domain\Enum\ProductType;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class UpdateProductCommand
{
    public function __construct(
        public Uuid $uuid,
        public ProductType $productType,
        public int $stockQuantity,
        public float $price,
        public string $title,
        public string $description,
        public string $pathImage,
    ) {
    }
}
