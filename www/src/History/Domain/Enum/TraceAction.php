<?php

declare(strict_types=1);

namespace HelloBees\History\Domain\Enum;

enum TraceAction: string
{
    case Form = 'form';
    case Import = 'import';
    case Webservice = 'webservice';
    case TraceComment = 'trace_comment';
}
