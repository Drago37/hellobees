<?php

declare(strict_types=1);

namespace HelloBees\Sales\Domain\Repository;

use HelloBees\Sales\Domain\Collection\CustomerCollection;
use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class CustomerRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface CustomerRepository
{
    /**
     * @param Uuid $uuid
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @return \HelloBees\Sales\Domain\Entity\Customer|null
     */
    public function find(Uuid $uuid): ?Customer;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws \HelloBees\SharedKernel\Domain\Exception\CollectionException
     * @return \HelloBees\Sales\Domain\Collection\CustomerCollection
     */
    public function findAll(): CustomerCollection;

    /**
     * @param \HelloBees\Sales\Domain\Entity\Customer $customer
     *
     * @throws RepositoryException
     *@return void
     */
    public function insert(Customer $customer): void;

    /**
     * @param \HelloBees\Sales\Domain\Entity\Customer $customer
     *
     * @throws RepositoryException
     *@return void
     */
    public function update(Customer $customer): void;

    /**
     * @param Customer $customer
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function delete(Customer $customer): void;
}