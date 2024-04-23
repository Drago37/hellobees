<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Repository;

use HelloBees\Domain\BeeKeeping\Collection\TaskCollection;
use HelloBees\Domain\BeeKeeping\Entity\Task;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class TaskRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface TaskRepository
{
    /**
     * @param Uuid $uuid
     * @return Task|null
     * @throws RepositoryException
     */
    public function find(Uuid $uuid): ?Task;

    /**
     * @return TaskCollection
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function findAll(): TaskCollection;

    /**
     * @param Task $task
     * @return void
     * @throws RepositoryException
     */
    public function insert(Task $task): void;

    /**
     * @param Task $task
     * @return void
     * @throws RepositoryException
     */
    public function update(Task $task): void;

    /**
     * @param Task $task
     * @return void
     * @throws RepositoryException
     */
    public function delete(Task $task): void;
}