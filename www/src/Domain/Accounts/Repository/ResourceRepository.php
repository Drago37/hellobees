<?php

declare(strict_types=1);

namespace HelloBees\Domain\Accounts\Repository;

use HelloBees\Domain\Accounts\Collection\ResourceCollection;
use HelloBees\Domain\Accounts\Entity\Credit;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Interface
 *
 * @class ResourceRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface ResourceRepository
{
    /**
     * @param Uuid $uuid
     * @return Credit|null
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Credit;

    /**
     * @return ResourceCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): ResourceCollection;

    /**
     * @param Credit $resource
     * @return void
     * @throws RepositoryException
     */
    public function insert(Credit $resource): void;

    /**
     * @param Credit $resource
     * @return void
     * @throws RepositoryException
     */
    public function update(Credit $resource): void;

    /**
     * @param Credit $resource
     * @return void
     * @throws RepositoryException
     */
    public function delete(Credit $resource): void;
}