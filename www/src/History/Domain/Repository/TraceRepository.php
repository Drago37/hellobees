<?php

declare(strict_types=1);

namespace HelloBees\History\Domain\Repository;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\BeeKeeping\Domain\Entity\Beehive;
use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\History\Domain\Collection\TraceCollection;
use HelloBees\History\Domain\Entity\Trace;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

interface TraceRepository
{
    /**
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Trace;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws CollectionException
     */
    public function findAll(): TraceCollection;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws \HelloBees\SharedKernel\Domain\Exception\CollectionException
     */
    public function findByApiary(Apiary $apiary): TraceCollection;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws CollectionException
     */
    public function findByBeehive(Beehive $beehive): TraceCollection;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws CollectionException
     */
    public function findByBeeKeeper(BeeKeeper $beeKeeper): TraceCollection;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function insert(Trace $beeKeeper): void;
}