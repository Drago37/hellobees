<?php

declare(strict_types=1);

namespace HelloBees\History\Domain\Enum;

enum TraceOperation: string
{
    case Create = 'create';
    case Update = 'update';
    case Delete = 'delete';
}
