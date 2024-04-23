<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Repository;

use HelloBees\Domain\BeeKeeping\Collection\VisitCollection;
use HelloBees\Domain\BeeKeeping\Entity\Visit;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class VisitRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface VisitRepository
{
    /**
     * @param Uuid $uuid
     * @return Visit|null
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Visit;

    /**
     * @return VisitCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): VisitCollection;

    /**
     * @param Visit $visit
     * @return void
     * @throws RepositoryException
     */
    public function insert(Visit $visit): void;

    /**
     * @param Visit $visit
     * @return void
     * @throws RepositoryException
     */
    public function update(Visit $visit): void;

    /**
     * @param Visit $visit
     * @return void
     * @throws RepositoryException
     */
    public function delete(Visit $visit): void;
}