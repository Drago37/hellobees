<?php

namespace HelloBees\BeeKeeping\Domain\Enum;

enum StockLevel: int
{
    case High = 0;
    case Medium = 1;
    case Low = 2;
}
