<?php

declare(strict_types=1);

namespace HelloBees\Sales\Domain\Enum;

enum ProductType: string
{
    case Honey = 'honey';
    case Swarm = 'swarm';
}