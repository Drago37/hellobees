<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Enum;

/**
 * Enum
 *
 * @class TaskStatus
 * @package HelloBees\Domain\BeeKeeping\Enum
 */
enum TaskStatus: string
{
    case Todo = 'to_do';
    case InProgress = 'in_progress';
    case Finished = 'finished';
    case Aborted = 'aborted';
}
