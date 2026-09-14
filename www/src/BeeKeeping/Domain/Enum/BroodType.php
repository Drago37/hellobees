<?php

namespace HelloBees\BeeKeeping\Domain\Enum;

enum BroodType: string
{
    case Open = 'open';
    case Close = 'close';
    case OpenAndClose = 'open_and_close';
}
