<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\Repository;

use HelloBees\Domain\Selling\Collection\ProductCollection;
use HelloBees\Domain\Selling\Entity\Product;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class ProductRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface ProductRepository
{
    /**
     * @param Uuid $uuid
     * @return Product|null
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Product;

    /**
     * @return ProductCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): ProductCollection;

    /**
     * @param Product $product
     * @return void
     * @throws RepositoryException
     */
    public function insert(Product $product): void;

    /**
     * @param Product $product
     * @return void
     * @throws RepositoryException
     */
    public function update(Product $product): void;

    /**
     * @param Product $product
     * @return void
     * @throws RepositoryException
     */
    public function delete(Product $product): void;
}