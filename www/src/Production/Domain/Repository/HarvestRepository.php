<?php

declare(strict_types=1);

namespace HelloBees\Production\Domain\Repository;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\Production\Domain\Collection\HarvestCollection;
use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

interface HarvestRepository
{
    /**
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Harvest;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws \HelloBees\SharedKernel\Domain\Exception\CollectionException
     */
    public function findAll(): HarvestCollection;

    /**
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findByApiary(Apiary $apiary): HarvestCollection;

    /**
     * @throws RepositoryException
     */
    public function insert(Harvest $harvest): void;

    /**
     * @throws RepositoryException
     */
    public function update(Harvest $harvest): void;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function delete(Harvest $harvest): void;
}