<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Double;

use HelloBees\Sales\Domain\Collection\ProductCollection;
use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\Sales\Domain\Repository\ProductRepository;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final class InMemoryProductRepository implements ProductRepository
{
    /** @var array<string, Product> */
    private array $store = [];

    public function find(Uuid $uuid): ?Product
    {
        return $this->store[(string) $uuid] ?? null;
    }

    public function findAll(): ProductCollection
    {
        return new ProductCollection(array_values($this->store));
    }

    public function insert(Product $product): void
    {
        $this->store[(string) $product->getUuid()] = $product;
    }

    public function update(Product $product): void
    {
        $this->store[(string) $product->getUuid()] = $product;
    }

    public function delete(Product $product): void
    {
        unset($this->store[(string) $product->getUuid()]);
    }
}
