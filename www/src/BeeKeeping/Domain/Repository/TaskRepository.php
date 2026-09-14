<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Repository;

use HelloBees\BeeKeeping\Domain\Collection\TaskCollection;
use HelloBees\BeeKeeping\Domain\Entity\Task;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

/**
 * Interface
 * @class TaskRepository
 * @package HelloBees\Domain\BeeKeeping\Repository
 */
interface TaskRepository
{
    /**
     * @param \HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid $uuid
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return Task|null
     */
    public function find(Uuid $uuid): ?Task;

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     * @throws \HelloBees\SharedKernel\Domain\Exception\CollectionException
     *@return TaskCollection
     */
    public function findAll(): TaskCollection;

    /**
     * @param \HelloBees\BeeKeeping\Domain\Entity\Task $task
     *
     * @throws RepositoryException
     *@return void
     */
    public function insert(Task $task): void;

    /**
     * @param \HelloBees\BeeKeeping\Domain\Entity\Task $task
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function update(Task $task): void;

    /**
     * @param \HelloBees\BeeKeeping\Domain\Entity\Task $task
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\RepositoryException
     *@return void
     */
    public function delete(Task $task): void;
}