<?php

declare(strict_types=1);

namespace HelloBees\Domain\Accounts\Repository;

use HelloBees\Domain\Accounts\Collection\ExpenseCollection;
use HelloBees\Domain\Accounts\Entity\Expense;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Interface
 *
 * @class ExpenseRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface ExpenseRepository
{
    /**
     * @param Uuid $uuid
     * @return Expense|null
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Expense;

    /**
     * @return ExpenseCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): ExpenseCollection;

    /**
     * @param Expense $expense
     * @return void
     * @throws RepositoryException
     */
    public function insert(Expense $expense): void;

    /**
     * @param Expense $expense
     * @return void
     * @throws RepositoryException
     */
    public function update(Expense $expense): void;

    /**
     * @param Expense $expense
     * @return void
     * @throws RepositoryException
     */
    public function delete(Expense $expense): void;
}