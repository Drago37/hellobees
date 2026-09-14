<?php

namespace HelloBees\SharedKernel\Domain\Enum;

/**
 * Enum
 *
 * @class AlertLevel
 * @package HelloBees\Domain\SharedKernel\Enum
 */
enum AlertLevel: string
{
    case None = 'none';
    case Warning = 'warning';
    case Danger = 'danger';
}
