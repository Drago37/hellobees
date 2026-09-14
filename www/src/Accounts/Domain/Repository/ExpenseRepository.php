<?php

declare(strict_types=1);

namespace HelloBees\Accounts\Domain\Repository;

use HelloBees\Accounts\Domain\Collection\ExpenseCollection;
use HelloBees\Accounts\Domain\Entity\Expense;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

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
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @return \HelloBees\Accounts\Domain\Entity\Expense|null
     */
    public function find(Uuid $uuid): ?Expense;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws \HelloBees\SharedKernel\Domain\Exception\CollectionException
     * @return ExpenseCollection
     */
    public function findAll(): ExpenseCollection;

    /**
     * @param Expense $expense
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function insert(Expense $expense): void;

    /**
     * @param \HelloBees\Accounts\Domain\Entity\Expense $expense
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function update(Expense $expense): void;

    /**
     * @param \HelloBees\Accounts\Domain\Entity\Expense $expense
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function delete(Expense $expense): void;
}