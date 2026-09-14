<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Double;

use HelloBees\Sales\Domain\Collection\CommandCollection;
use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\Sales\Domain\Repository\CommandRepository;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final class InMemoryCommandRepository implements CommandRepository
{
    /** @var array<string, Command> */
    private array $store = [];

    public function find(Uuid $uuid): ?Command
    {
        return $this->store[(string) $uuid] ?? null;
    }

    public function findAll(): CommandCollection
    {
        return new CommandCollection(array_values($this->store));
    }

    public function findByCustomer(Customer $customer): CommandCollection
    {
        return new CommandCollection(array_values(array_filter(
            $this->store,
            static fn (Command $command): bool => (string) $command->getCustomer()->getUuid() === (string) $customer->getUuid(),
        )));
    }

    public function insert(Command $command): void
    {
        $this->store[(string) $command->getUuid()] = $command;
    }

    public function update(Command $command): void
    {
        $this->store[(string) $command->getUuid()] = $command;
    }

    public function delete(Command $command): void
    {
        unset($this->store[(string) $command->getUuid()]);
    }
}
