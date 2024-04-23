<?php

declare(strict_types=1);

namespace HelloBees\Domain\Accounts\Repository;

use HelloBees\Domain\Accounts\Collection\ResourceCollection;
use HelloBees\Domain\Accounts\Entity\Resource;
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
     * @return Resource|null
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Resource;

    /**
     * @return ResourceCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): ResourceCollection;

    /**
     * @param Resource $resource
     * @return void
     * @throws RepositoryException
     */
    public function insert(Resource $resource): void;

    /**
     * @param Resource $resource
     * @return void
     * @throws RepositoryException
     */
    public function update(Resource $resource): void;

    /**
     * @param Resource $resource
     * @return void
     * @throws RepositoryException
     */
    public function delete(Resource $resource): void;
}