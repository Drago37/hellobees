<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Enum;

enum BeeKeeperType: string
{
    case Amateur = 'amateur';
    case Professional = 'pro';
}
