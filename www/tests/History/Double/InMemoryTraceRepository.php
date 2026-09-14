<?php

declare(strict_types=1);

namespace HelloBeesTest\History\Double;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\BeeKeeping\Domain\Entity\Beehive;
use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\History\Domain\Collection\TraceCollection;
use HelloBees\History\Domain\Entity\Trace;
use HelloBees\History\Domain\Repository\TraceRepository;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final class InMemoryTraceRepository implements TraceRepository
{
    /** @var array<string, Trace> */
    private array $store = [];

    public function find(Uuid $uuid): ?Trace
    {
        return $this->store[(string) $uuid] ?? null;
    }

    public function findAll(): TraceCollection
    {
        return new TraceCollection(array_values($this->store));
    }

    public function findByApiary(Apiary $apiary): TraceCollection
    {
        return new TraceCollection(array_values(array_filter(
            $this->store,
            static fn (Trace $trace): bool => $trace->getApiaryId() === (string) $apiary->getUuid(),
        )));
    }

    public function findByBeehive(Beehive $beehive): TraceCollection
    {
        return new TraceCollection(array_values(array_filter(
            $this->store,
            static fn (Trace $trace): bool => $trace->getBeehiveId() === (string) $beehive->getUuid(),
        )));
    }

    public function findByBeeKeeper(BeeKeeper $beeKeeper): TraceCollection
    {
        return new TraceCollection(array_values(array_filter(
            $this->store,
            static fn (Trace $trace): bool => $trace->getBeeKeeperId() === (string) $beeKeeper->getUuid(),
        )));
    }

    public function insert(Trace $beeKeeper): void
    {
        $this->store[(string) $beeKeeper->getUuid()] = $beeKeeper;
    }
}
