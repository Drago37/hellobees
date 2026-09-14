<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Repository;

use HelloBees\BeeKeeping\Domain\Collection\TaskCollection;
use HelloBees\BeeKeeping\Domain\Entity\Task;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

interface TaskRepository
{
    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function find(Uuid $uuid): ?Task;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws \HelloBees\SharedKernel\Domain\Exception\CollectionException
     */
    public function findAll(): TaskCollection;

    /**
     * @throws RepositoryException
     */
    public function insert(Task $task): void;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function update(Task $task): void;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     */
    public function delete(Task $task): void;
}