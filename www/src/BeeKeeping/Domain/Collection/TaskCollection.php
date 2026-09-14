<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Collection;

use HelloBees\BeeKeeping\Domain\Entity\Task;
use HelloBees\SharedKernel\Domain\Collection\Collection;

/**
 * Class
 * @class TaskCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends \HelloBees\SharedKernel\Domain\Collection\Collection<Task>
 */
class TaskCollection extends \HelloBees\SharedKernel\Domain\Collection\Collection
{
    /**
     * @return class-string<\HelloBees\BeeKeeping\Domain\Entity\Task>
     */
    protected function itemClass(): string
    {
        return Task::class;
    }
}