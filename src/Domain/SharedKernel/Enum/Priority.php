<?php

namespace HelloBees\Domain\SharedKernel\Enum;

/**
 * Enum
 *
 * @class Priority
 * @package HelloBees\Domain\SharedKernel\Enum
 */
enum Priority: int
{
    case High = 0;
    case Medium = 1;
    case Low = 2;
}
