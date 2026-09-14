<?php

declare(strict_types=1);

namespace HelloBees\Sales\Domain\Repository;

use HelloBees\Sales\Domain\Collection\CommandCollection;
use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

interface CommandRepository
{
    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function find(Uuid $uuid): ?Command;

    /**
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): CommandCollection;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws \HelloBees\SharedKernel\Domain\Exception\CollectionException
     */
    public function findByCustomer(Customer $customer): CommandCollection;

    /**
     * @throws RepositoryException
     */
    public function insert(Command $command): void;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function update(Command $command): void;

    /**
     * @throws RepositoryException
     */
    public function delete(Command $command): void;
}