<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Enum;

enum ApiaryEnvironment: string
{
    case Mountain = 'mountain';
    case City = 'city';
    case Forest = 'forest';
    case Countryside = 'countryside';
}
