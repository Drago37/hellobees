<?php

namespace HelloBees\Domain\SharedKernel\Enum;

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
