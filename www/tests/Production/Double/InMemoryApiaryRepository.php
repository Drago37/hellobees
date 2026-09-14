<?php

declare(strict_types=1);

namespace HelloBeesTest\Production\Double;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\BeeKeeping\Domain\Collection\ApiaryCollection;
use HelloBees\BeeKeeping\Domain\Repository\ApiaryRepository;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final class InMemoryApiaryRepository implements ApiaryRepository
{
    /** @var array<string, Apiary> */
    private array $store = [];

    public function find(Uuid $uuid): ?Apiary
    {
        return $this->store[(string) $uuid] ?? null;
    }

    public function findAll(): ApiaryCollection
    {
        return new ApiaryCollection(array_values($this->store));
    }

    public function insert(Apiary $apiary): void
    {
        $this->store[(string) $apiary->getUuid()] = $apiary;
    }

    public function update(Apiary $apiary): void
    {
        $this->store[(string) $apiary->getUuid()] = $apiary;
    }

    public function delete(Apiary $apiary): void
    {
        unset($this->store[(string) $apiary->getUuid()]);
    }
}
