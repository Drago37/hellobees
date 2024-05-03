<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Collection;

use HelloBees\Domain\BeeKeeping\Entity\Task;
use HelloBees\Domain\SharedKernel\Collection\Collection;

/**
 * Class
 * @class TaskCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends Collection<Task>
 */
class TaskCollection extends Collection
{
    /**
     * @return class-string<Task>
     */
    protected function itemClass(): string
    {
        return Task::class;
    }
}