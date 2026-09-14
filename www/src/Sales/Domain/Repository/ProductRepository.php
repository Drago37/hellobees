<?php

declare(strict_types=1);

namespace HelloBees\Sales\Domain\Repository;

use HelloBees\Sales\Domain\Collection\ProductCollection;
use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class ProductRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface ProductRepository
{
    /**
     * @param Uuid $uuid
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @return \HelloBees\Sales\Domain\Entity\Product|null
     */
    public function find(Uuid $uuid): ?Product;

    /**
     * @throws RepositoryException
     * @throws CollectionException
     *@return \HelloBees\Sales\Domain\Collection\ProductCollection
     */
    public function findAll(): ProductCollection;

    /**
     * @param \HelloBees\Sales\Domain\Entity\Product $product
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function insert(Product $product): void;

    /**
     * @param \HelloBees\Sales\Domain\Entity\Product $product
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function update(Product $product): void;

    /**
     * @param \HelloBees\Sales\Domain\Entity\Product $product
     *
     * @throws RepositoryException
     *@return void
     */
    public function delete(Product $product): void;
}