<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Enum;

/**
 * Class
 * @class BeeKeeperType
 * @package HelloBees\Domain\BeeKeeping\Enum
 */
enum BeeKeeperType: string
{
    case Amateur = 'amateur';
    case Professional = 'pro';
}
