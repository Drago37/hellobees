<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\Repository;

use HelloBees\Domain\Selling\Collection\CustomerCollection;
use HelloBees\Domain\Selling\Entity\Customer;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class CustomerRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface CustomerRepository
{
    /**
     * @param Uuid $uuid
     * @return Customer|null
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Customer;

    /**
     * @return CustomerCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): CustomerCollection;

    /**
     * @param Customer $customer
     * @return void
     * @throws RepositoryException
     */
    public function insert(Customer $customer): void;

    /**
     * @param Customer $customer
     * @return void
     * @throws RepositoryException
     */
    public function update(Customer $customer): void;

    /**
     * @param Customer $customer
     * @return void
     * @throws RepositoryException
     */
    public function delete(Customer $customer): void;
}