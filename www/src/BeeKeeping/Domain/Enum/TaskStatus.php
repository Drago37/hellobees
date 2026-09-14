<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Enum;

enum TaskStatus: string
{
    case Todo = 'to_do';
    case InProgress = 'in_progress';
    case Blocked = 'blocked';
    case Finished = 'finished';
    case Aborted = 'aborted';
}
