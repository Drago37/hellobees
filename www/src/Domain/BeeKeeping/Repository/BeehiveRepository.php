<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Repository;

use HelloBees\Domain\BeeKeeping\Collection\BeehiveCollection;
use HelloBees\Domain\BeeKeeping\Entity\Beehive;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class BeehiveRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface BeehiveRepository
{
    /**
     * @param Uuid $uuid
     * @return Beehive|null
     * @throws RepositoryException
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
     * @param Beehive $beehive
     * @return void
     * @throws RepositoryException
     */
    public function delete(Beehive $beehive): void;
}