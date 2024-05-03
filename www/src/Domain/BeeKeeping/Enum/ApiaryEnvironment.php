<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Enum;

/**
 * Enum
 *
 * @class ApiaryEnvironment
 * @package HelloBees\Domain\BeeKeeping\Enum
 */
enum ApiaryEnvironment: string
{
    case Mountain = 'mountain';
    case City = 'city';
    case Forest = 'forest';
    case Countryside = 'countryside';
}
