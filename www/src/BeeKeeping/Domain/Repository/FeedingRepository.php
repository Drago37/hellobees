<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Repository;

use HelloBees\BeeKeeping\Domain\Collection\FeedingCollection;
use HelloBees\BeeKeeping\Domain\Entity\Feeding;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

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
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws CollectionException
     *@return \HelloBees\BeeKeeping\Domain\Collection\FeedingCollection
     */
    public function findAll(): FeedingCollection;

    /**
     * @param \HelloBees\BeeKeeping\Domain\Entity\Feeding $feeding
     *
     * @throws RepositoryException
     *@return void
     */
    public function insert(Feeding $feeding): void;

    /**
     * @param \HelloBees\BeeKeeping\Domain\Entity\Feeding $feeding
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function update(Feeding $feeding): void;

    /**
     * @param \HelloBees\BeeKeeping\Domain\Entity\Feeding $feeding
     *
     * @throws RepositoryException
     *@return void
     */
    public function delete(Feeding $feeding): void;
}