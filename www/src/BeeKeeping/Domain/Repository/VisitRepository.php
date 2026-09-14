<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Repository;

use HelloBees\BeeKeeping\Domain\Collection\VisitCollection;
use HelloBees\BeeKeeping\Domain\Entity\Visit;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class VisitRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface VisitRepository
{
    /**
     * @param \HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid $uuid
     *
     * @throws RepositoryException
     *@return Visit|null
     */
    public function find(Uuid $uuid): ?Visit;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws CollectionException
     *@return VisitCollection
     */
    public function findAll(): VisitCollection;

    /**
     * @param Visit $visit
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function insert(Visit $visit): void;

    /**
     * @param Visit $visit
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function update(Visit $visit): void;

    /**
     * @param Visit $visit
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function delete(Visit $visit): void;
}