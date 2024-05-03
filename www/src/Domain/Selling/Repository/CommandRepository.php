<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\Repository;

use HelloBees\Domain\Selling\Collection\CommandCollection;
use HelloBees\Domain\Selling\Entity\Command;
use HelloBees\Domain\Selling\Entity\Customer;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class CommandRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface CommandRepository
{
    /**
     * @param Uuid $uuid
     * @return Command|null
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Command;

    /**
     * @return CommandCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): CommandCollection;

    /**
     * @param Customer $customer
     * @return CommandCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findByCustomer(Customer $customer): CommandCollection;

    /**
     * @param Command $command
     * @return void
     * @throws RepositoryException
     */
    public function insert(Command $command): void;

    /**
     * @param Command $command
     * @return void
     * @throws RepositoryException
     */
    public function update(Command $command): void;

    /**
     * @param Command $command
     * @return void
     * @throws RepositoryException
     */
    public function delete(Command $command): void;
}