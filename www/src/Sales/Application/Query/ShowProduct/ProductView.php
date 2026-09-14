<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Query\ShowProduct;

use HelloBees\Sales\Domain\Entity\Product;

final readonly class ProductView
{
    public function __construct(
        public string $uuid,
        public string $productType,
        public int $stockQuantity,
        public float $price,
        public string $title,
        public string $description,
        public string $pathImage,
        public string $created,
    ) {
    }

    public static function fromEntity(Product $product): self
    {
        return new self(
            (string) $product->getUuid(),
            $product->getProductType()->value,
            $product->getStockQuantity(),
            $product->getPrice(),
            $product->getTitle(),
            $product->getDescription(),
            $product->getPathImage(),
            $product->getCreated()->toString(),
        );
    }
}
