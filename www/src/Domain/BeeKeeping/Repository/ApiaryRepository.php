<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Repository;

use HelloBees\Domain\BeeKeeping\Aggregate\Apiary;
use HelloBees\Domain\BeeKeeping\Collection\ApiaryCollection;
use HelloBees\Domain\BeeKeeping\Entity\Beehive;
use HelloBees\Domain\BeeKeeping\Entity\BeeKeeper;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class ApiaryRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface ApiaryRepository
{
    /**
     * @param Uuid $uuid
     * @return Apiary|null
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Apiary;

    /**
     * @return ApiaryCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): ApiaryCollection;

    /**
     * @param Apiary $apiary
     * @return void
     * @throws RepositoryException
     */
    public function insert(Apiary $apiary): void;

    /**
     * @param Apiary $apiary
     * @return void
     * @throws RepositoryException
     */
    public function update(Apiary $apiary): void;

    /**
     * @param Apiary $apiary
     * @return void
     * @throws RepositoryException
     */
    public function delete(Apiary $apiary): void;
}