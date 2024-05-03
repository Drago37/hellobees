<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\Repository;

use HelloBees\Domain\BeeKeeping\Aggregate\Apiary;
use HelloBees\Domain\Production\Collection\HarvestCollection;
use HelloBees\Domain\Production\Entity\Harvest;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class HarvestRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface HarvestRepository
{
    /**
     * @param Uuid $uuid
     * @return Harvest|null
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Harvest;

    /**
     * @return HarvestCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): HarvestCollection;

    /**
     * @param Apiary $apiary
     * @return HarvestCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findByApiary(Apiary $apiary): HarvestCollection;

    /**
     * @param Harvest $harvest
     * @return void
     * @throws RepositoryException
     */
    public function insert(Harvest $harvest): void;

    /**
     * @param Harvest $harvest
     * @return void
     * @throws RepositoryException
     */
    public function update(Harvest $harvest): void;

    /**
     * @param Harvest $harvest
     * @return void
     * @throws RepositoryException
     */
    public function delete(Harvest $harvest): void;
}