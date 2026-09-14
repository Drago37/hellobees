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

/**
 * Interface
 * @class TraceRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface TraceRepository
{
    /**
     * @param \HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid $uuid
     *
     * @throws RepositoryException
     *@return \HelloBees\History\Domain\Entity\Trace|null
     */
    public function find(Uuid $uuid): ?Trace;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws CollectionException
     *@return TraceCollection
     */
    public function findAll(): TraceCollection;

    /**
     * @param Apiary $apiary
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws \HelloBees\SharedKernel\Domain\Exception\CollectionException
     *@return TraceCollection
     */
    public function findByApiary(Apiary $apiary): TraceCollection;

    /**
     * @param Beehive $beehive
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws CollectionException
     *@return \HelloBees\History\Domain\Collection\TraceCollection
     */
    public function findByBeehive(Beehive $beehive): TraceCollection;

    /**
     * @param \HelloBees\BeeKeeping\Domain\Entity\BeeKeeper $beeKeeper
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws CollectionException
     *@return TraceCollection
     */
    public function findByBeeKeeper(BeeKeeper $beeKeeper): TraceCollection;

    /**
     * @param \HelloBees\History\Domain\Entity\Trace $beeKeeper
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function insert(Trace $beeKeeper): void;
}