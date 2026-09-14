<?php

declare(strict_types=1);

namespace HelloBeesTest\BeeKeeping\Double;

use HelloBees\BeeKeeping\Domain\Collection\BeekeeperCollection;
use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\BeeKeeping\Domain\Repository\BeekeeperRepository;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final class InMemoryBeekeeperRepository implements BeekeeperRepository
{
    /** @var array<string, BeeKeeper> */
    private array $store = [];

    public function find(Uuid $uuid): ?BeeKeeper
    {
        return $this->store[(string) $uuid] ?? null;
    }

    public function findAll(): BeekeeperCollection
    {
        return new BeekeeperCollection(array_values($this->store));
    }

    public function insert(BeeKeeper $beeKeeper): void
    {
        $this->store[(string) $beeKeeper->getUuid()] = $beeKeeper;
    }

    public function update(BeeKeeper $beeKeeper): void
    {
        $this->store[(string) $beeKeeper->getUuid()] = $beeKeeper;
    }

    public function delete(BeeKeeper $beeKeeper): void
    {
        unset($this->store[(string) $beeKeeper->getUuid()]);
    }
}
