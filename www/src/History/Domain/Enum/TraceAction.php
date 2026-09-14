<?php

declare(strict_types=1);

namespace HelloBees\History\Domain\Enum;

/**
 * Enum
 *
 * @class TraceAction
 * @package HelloBees\Domain\Trace\Enum
 */
enum TraceAction: string
{
    case Form = 'form';
    case Import = 'import';
    case Webservice = 'webservice';
    case TraceComment = 'trace_comment';
}
