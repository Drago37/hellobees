<?php

declare(strict_types=1);

namespace HelloBees\Sales\Domain\Repository;

use HelloBees\Sales\Domain\Collection\ProductCollection;
use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

interface ProductRepository
{
    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function find(Uuid $uuid): ?Product;

    /**
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): ProductCollection;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function insert(Product $product): void;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function update(Product $product): void;

    /**
     * @throws RepositoryException
     */
    public function delete(Product $product): void;
}