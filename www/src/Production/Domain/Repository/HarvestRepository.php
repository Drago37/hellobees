<?php

declare(strict_types=1);

namespace HelloBees\Production\Domain\Repository;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\Production\Domain\Collection\HarvestCollection;
use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class HarvestRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface HarvestRepository
{
    /**
     * @param \HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid $uuid
     *
     * @throws RepositoryException
     *@return \HelloBees\Production\Domain\Entity\Harvest|null
     */
    public function find(Uuid $uuid): ?Harvest;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws \HelloBees\SharedKernel\Domain\Exception\CollectionException
     * @return \HelloBees\Production\Domain\Collection\HarvestCollection
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
     * @param \HelloBees\Production\Domain\Entity\Harvest $harvest
     *
     * @throws RepositoryException
     *@return void
     */
    public function insert(Harvest $harvest): void;

    /**
     * @param \HelloBees\Production\Domain\Entity\Harvest $harvest
     *
     * @throws RepositoryException
     *@return void
     */
    public function update(Harvest $harvest): void;

    /**
     * @param \HelloBees\Production\Domain\Entity\Harvest $harvest
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function delete(Harvest $harvest): void;
}