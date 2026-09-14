<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Repository;

use HelloBees\BeeKeeping\Domain\Collection\BeehiveCollection;
use HelloBees\BeeKeeping\Domain\Entity\Beehive;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class BeehiveRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface BeehiveRepository
{
    /**
     * @param \HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid $uuid
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return Beehive|null
     */
    public function find(Uuid $uuid): ?Beehive;

    /**
     * @return BeehiveCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): BeehiveCollection;

    /**
     * @param Beehive $beehive
     * @return void
     * @throws RepositoryException
     */
    public function insert(Beehive $beehive): void;

    /**
     * @param Beehive $beehive
     * @return void
     * @throws RepositoryException
     */
    public function update(Beehive $beehive): void;

    /**
     * @param \HelloBees\BeeKeeping\Domain\Entity\Beehive $beehive
     *
     * @throws RepositoryException
     *@return void
     */
    public function delete(Beehive $beehive): void;
}