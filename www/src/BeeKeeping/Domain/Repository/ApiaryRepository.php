<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Repository;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\BeeKeeping\Domain\Collection\ApiaryCollection;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class ApiaryRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface ApiaryRepository
{
    /**
     * @param \HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid $uuid
     *
     * @throws RepositoryException
     *@return \HelloBees\BeeKeeping\Domain\Aggregate\Apiary|null
     */
    public function find(Uuid $uuid): ?Apiary;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws \HelloBees\SharedKernel\Domain\Exception\CollectionException
     * @return \HelloBees\BeeKeeping\Domain\Collection\ApiaryCollection
     */
    public function findAll(): ApiaryCollection;

    /**
     * @param \HelloBees\BeeKeeping\Domain\Aggregate\Apiary $apiary
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function insert(Apiary $apiary): void;

    /**
     * @param \HelloBees\BeeKeeping\Domain\Aggregate\Apiary $apiary
     *
     * @throws RepositoryException
     *@return void
     */
    public function update(Apiary $apiary): void;

    /**
     * @param \HelloBees\BeeKeeping\Domain\Aggregate\Apiary $apiary
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function delete(Apiary $apiary): void;
}