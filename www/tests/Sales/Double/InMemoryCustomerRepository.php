<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Double;

use HelloBees\Sales\Domain\Collection\CustomerCollection;
use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\Sales\Domain\Repository\CustomerRepository;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final class InMemoryCustomerRepository implements CustomerRepository
{
    /** @var array<string, Customer> */
    private array $store = [];

    public function find(Uuid $uuid): ?Customer
    {
        return $this->store[(string) $uuid] ?? null;
    }

    public function findAll(): CustomerCollection
    {
        return new CustomerCollection(array_values($this->store));
    }

    public function insert(Customer $customer): void
    {
        $this->store[(string) $customer->getUuid()] = $customer;
    }

    public function update(Customer $customer): void
    {
        $this->store[(string) $customer->getUuid()] = $customer;
    }

    public function delete(Customer $customer): void
    {
        unset($this->store[(string) $customer->getUuid()]);
    }
}
