<?php

declare(strict_types=1);

namespace HelloBeesTest\Production\Double;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\Production\Domain\Collection\HarvestCollection;
use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\Production\Domain\Repository\HarvestRepository;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final class InMemoryHarvestRepository implements HarvestRepository
{
    /** @var array<string, Harvest> */
    private array $store = [];

    public function find(Uuid $uuid): ?Harvest
    {
        return $this->store[(string) $uuid] ?? null;
    }

    public function findAll(): HarvestCollection
    {
        return new HarvestCollection(array_values($this->store));
    }

    public function findByApiary(Apiary $apiary): HarvestCollection
    {
        return new HarvestCollection(array_values(array_filter(
            $this->store,
            static fn (Harvest $harvest): bool => (string) $harvest->getApiary()->getUuid() === (string) $apiary->getUuid(),
        )));
    }

    public function insert(Harvest $harvest): void
    {
        $this->store[(string) $harvest->getUuid()] = $harvest;
    }

    public function update(Harvest $harvest): void
    {
        $this->store[(string) $harvest->getUuid()] = $harvest;
    }

    public function delete(Harvest $harvest): void
    {
        unset($this->store[(string) $harvest->getUuid()]);
    }
}
