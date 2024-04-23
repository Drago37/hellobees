<?php

namespace HelloBees\Domain\BeeKeeping\Enum;

/**
 * Enum
 *
 * @class StockLevel
 * @package HelloBees\Domain\BeeKeeping\Enum
 */
enum StockLevel: int
{
    case High = 0;
    case Medium = 1;
    case Low = 2;
}
