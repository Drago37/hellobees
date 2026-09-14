<?php

declare(strict_types=1);

namespace HelloBees\Sales\Domain\Repository;

use HelloBees\Sales\Domain\Collection\CommandCollection;
use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class CommandRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface CommandRepository
{
    /**
     * @param \HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid $uuid
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return \HelloBees\Sales\Domain\Entity\Command|null
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
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws \HelloBees\SharedKernel\Domain\Exception\CollectionException
     *@return \HelloBees\Sales\Domain\Collection\CommandCollection
     */
    public function findByCustomer(Customer $customer): CommandCollection;

    /**
     * @param \HelloBees\Sales\Domain\Entity\Command $command
     *
     * @throws RepositoryException
     *@return void
     */
    public function insert(Command $command): void;

    /**
     * @param \HelloBees\Sales\Domain\Entity\Command $command
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function update(Command $command): void;

    /**
     * @param Command $command
     * @return void
     * @throws RepositoryException
     */
    public function delete(Command $command): void;
}