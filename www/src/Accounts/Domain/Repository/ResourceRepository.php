<?php

declare(strict_types=1);

namespace HelloBees\Accounts\Domain\Repository;

use HelloBees\Accounts\Domain\Collection\ResourceCollection;
use HelloBees\Accounts\Domain\Entity\Credit;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

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
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return Credit|null
     */
    public function find(Uuid $uuid): ?Credit;

    /**
     * @throws RepositoryException
     * @throws CollectionException
     *@return \HelloBees\Accounts\Domain\Collection\ResourceCollection
     */
    public function findAll(): ResourceCollection;

    /**
     * @param \HelloBees\Accounts\Domain\Entity\Credit $resource
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function insert(Credit $resource): void;

    /**
     * @param \HelloBees\Accounts\Domain\Entity\Credit $resource
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function update(Credit $resource): void;

    /**
     * @param Credit $resource
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function delete(Credit $resource): void;
}