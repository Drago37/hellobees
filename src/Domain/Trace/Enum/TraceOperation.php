<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\Enum;

/**
 * Enum
 *
 * @class TraceOperation
 * @package HelloBees\Domain\Trace\Enum
 */
enum TraceOperation: string
{
    case Create = 'create';
    case Update = 'update';
    case Delete = 'delete';
}
