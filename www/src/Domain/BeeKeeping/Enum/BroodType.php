<?php

namespace HelloBees\Domain\BeeKeeping\Enum;

/**
 * Enum
 *
 * @class BroodType
 * @package HelloBees\Domain\BeeKeeping\Enum
 */
enum BroodType: string
{
    case Open = 'open';
    case Close = 'close';
    case OpenAndClose = 'open_and_close';
}
