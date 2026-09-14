<?php

namespace HelloBees\SharedKernel\Domain\Enum;

enum AlertLevel: string
{
    case None = 'none';
    case Warning = 'warning';
    case Danger = 'danger';
}
