<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\Repository;

use HelloBees\Domain\SharedKernel\Collection\Collection;
use HelloBees\Domain\SharedKernel\Entity\Entity;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;

/**
 * Interface
 *
 * @class    EntityRepository
 * @package  HelloBees\Domain\SharedKernel\Repository
 * @template TEntity of Entity
 */
interface EntityRepository
{
    /**
     * @param mixed $id
     * @return null|TEntity
     * @throws RepositoryException
     */
    public function find(mixed $id): ?Entity;

    /**
     * @return Collection<TEntity>
     * @throws CollectionException
     * @throws RepositoryException
     */
    public function findAll(): Collection;

    /**
     * @param CriteriaInterface|null     $criteria
     * @param SortedFieldCollection|null $sort
     * @param int|null                   $limit
     * @param int|null                   $offset
     * @return Collection<TEntity>
     * @throws CollectionException
     * @throws RepositoryException
     */
    public function findBy(
        ?CriteriaInterface $criteria,
        ?SortedFieldCollection $sort = null,
        ?int $limit = null,
        ?int $offset = null
    ): Collection;
}
