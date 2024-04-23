<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Repository;

use HelloBees\Domain\BeeKeeping\Collection\FeedingCollection;
use HelloBees\Domain\BeeKeeping\Entity\Feeding;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class FeedingRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface FeedingRepository
{
    /**
     * @param Uuid $uuid
     * @return Feeding|null
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Feeding;

    /**
     * @return FeedingCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): FeedingCollection;

    /**
     * @param Feeding $feeding
     * @return void
     * @throws RepositoryException
     */
    public function insert(Feeding $feeding): void;

    /**
     * @param Feeding $feeding
     * @return void
     * @throws RepositoryException
     */
    public function update(Feeding $feeding): void;

    /**
     * @param Feeding $feeding
     * @return void
     * @throws RepositoryException
     */
    public function delete(Feeding $feeding): void;
}