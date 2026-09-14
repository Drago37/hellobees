<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Command\AddProduct;

use HelloBees\Sales\Domain\Enum\ProductType;

final readonly class AddProductCommand
{
    public function __construct(
        public ProductType $productType,
        public int $stockQuantity,
        public float $price,
        public string $title,
        public string $description,
        public string $pathImage,
    ) {
    }
}
