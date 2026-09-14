<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Repository;

use HelloBees\BeeKeeping\Domain\Collection\BeehiveCollection;
use HelloBees\BeeKeeping\Domain\Entity\Beehive;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

interface BeehiveRepository
{
    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function find(Uuid $uuid): ?Beehive;

    /**
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): BeehiveCollection;

    /**
     * @throws RepositoryException
     */
    public function insert(Beehive $beehive): void;

    /**
     * @throws RepositoryException
     */
    public function update(Beehive $beehive): void;

    /**
     * @throws RepositoryException
     */
    public function delete(Beehive $beehive): void;
}