<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Repository;

use HelloBees\BeeKeeping\Domain\Collection\FeedingCollection;
use HelloBees\BeeKeeping\Domain\Entity\Feeding;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

interface FeedingRepository
{
    /**
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Feeding;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws CollectionException
     */
    public function findAll(): FeedingCollection;

    /**
     * @throws RepositoryException
     */
    public function insert(Feeding $feeding): void;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function update(Feeding $feeding): void;

    /**
     * @throws RepositoryException
     */
    public function delete(Feeding $feeding): void;
}