<?php

declare(strict_types=1);

namespace HelloBees\Accounts\Domain\Repository;

use HelloBees\Accounts\Domain\Collection\ExpenseCollection;
use HelloBees\Accounts\Domain\Entity\Expense;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

interface ExpenseRepository
{
    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function find(Uuid $uuid): ?Expense;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws \HelloBees\SharedKernel\Domain\Exception\CollectionException
     */
    public function findAll(): ExpenseCollection;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function insert(Expense $expense): void;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function update(Expense $expense): void;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function delete(Expense $expense): void;
}