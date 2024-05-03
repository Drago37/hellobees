<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Repository;

use HelloBees\Domain\BeeKeeping\Collection\BeekeeperCollection;
use HelloBees\Domain\BeeKeeping\Entity\BeeKeeper;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class BeekeeperRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface BeekeeperRepository
{
    /**
     * @param Uuid $uuid
     * @return Beekeeper|null
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Beekeeper;

    /**
     * @return BeekeeperCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): BeekeeperCollection;

    /**
     * @param BeeKeeper $beeKeeper
     * @return void
     * @throws RepositoryException
     */
    public function insert(BeeKeeper $beeKeeper): void;

    /**
     * @param BeeKeeper $beeKeeper
     * @return void
     * @throws RepositoryException
     */
    public function update(BeeKeeper $beeKeeper): void;

    /**
     * @param BeeKeeper $beeKeeper
     * @return void
     * @throws RepositoryException
     */
    public function delete(BeeKeeper $beeKeeper): void;
}