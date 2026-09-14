<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Repository;

use HelloBees\BeeKeeping\Domain\Collection\BeekeeperCollection;
use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

interface BeekeeperRepository
{
    /**
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Beekeeper;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws CollectionException
     */
    public function findAll(): BeekeeperCollection;

    /**
     * @throws RepositoryException
     */
    public function insert(BeeKeeper $beeKeeper): void;

    /**
     * @throws RepositoryException
     */
    public function update(BeeKeeper $beeKeeper): void;

    /**
     * @throws RepositoryException
     */
    public function delete(BeeKeeper $beeKeeper): void;
}