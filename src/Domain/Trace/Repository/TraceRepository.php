<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\Repository;

use HelloBees\Domain\BeeKeeping\Aggregate\Apiary;
use HelloBees\Domain\BeeKeeping\Entity\Beehive;
use HelloBees\Domain\BeeKeeping\Entity\BeeKeeper;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;
use HelloBees\Domain\Trace\Collection\TraceCollection;
use HelloBees\Domain\Trace\Entity\Trace;

/**
 * Interface
 * @class TraceRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface TraceRepository
{
    /**
     * @param Uuid $uuid
     * @return Trace|null
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Trace;

    /**
     * @return TraceCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): TraceCollection;

    /**
     * @param Apiary $apiary
     * @return TraceCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findByApiary(Apiary $apiary): TraceCollection;

    /**
     * @param Beehive $beehive
     * @return TraceCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findByBeehive(Beehive $beehive): TraceCollection;

    /**
     * @param BeeKeeper $beeKeeper
     * @return TraceCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findByBeeKeeper(BeeKeeper $beeKeeper): TraceCollection;

    /**
     * @param Trace $beeKeeper
     * @return void
     * @throws RepositoryException
     */
    public function insert(Trace $beeKeeper): void;
}