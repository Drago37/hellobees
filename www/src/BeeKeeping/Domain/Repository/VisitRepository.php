<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Repository;

use HelloBees\BeeKeeping\Domain\Collection\VisitCollection;
use HelloBees\BeeKeeping\Domain\Entity\Visit;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

interface VisitRepository
{
    /**
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Visit;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws CollectionException
     */
    public function findAll(): VisitCollection;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function insert(Visit $visit): void;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function update(Visit $visit): void;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function delete(Visit $visit): void;
}