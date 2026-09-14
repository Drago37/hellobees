<?php

declare(strict_types=1);

namespace HelloBees\Accounts\Domain\Repository;

use HelloBees\Accounts\Domain\Collection\ResourceCollection;
use HelloBees\Accounts\Domain\Entity\Credit;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

interface ResourceRepository
{
    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function find(Uuid $uuid): ?Credit;

    /**
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): ResourceCollection;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function insert(Credit $resource): void;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function update(Credit $resource): void;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function delete(Credit $resource): void;
}