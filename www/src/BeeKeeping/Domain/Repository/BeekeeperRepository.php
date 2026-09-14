<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Repository;

use HelloBees\BeeKeeping\Domain\Collection\BeekeeperCollection;
use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class BeekeeperRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface BeekeeperRepository
{
    /**
     * @param \HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid $uuid
     *
     * @throws RepositoryException
     *@return \HelloBees\BeeKeeping\Domain\Entity\Beekeeper|null
     */
    public function find(Uuid $uuid): ?Beekeeper;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws CollectionException
     *@return BeekeeperCollection
     */
    public function findAll(): BeekeeperCollection;

    /**
     * @param \HelloBees\BeeKeeping\Domain\Entity\BeeKeeper $beeKeeper
     *
     * @throws RepositoryException
     *@return void
     */
    public function insert(BeeKeeper $beeKeeper): void;

    /**
     * @param \HelloBees\BeeKeeping\Domain\Entity\BeeKeeper $beeKeeper
     *
     * @throws RepositoryException
     *@return void
     */
    public function update(BeeKeeper $beeKeeper): void;

    /**
     * @param \HelloBees\BeeKeeping\Domain\Entity\BeeKeeper $beeKeeper
     *
     * @throws RepositoryException
     *@return void
     */
    public function delete(BeeKeeper $beeKeeper): void;
}