<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\Enum;

/**
 * Enum
 *
 * @class ProductType
 * @package HelloBees\Domain\Selling\Enum
 */
enum ProductType: string
{
    case Honey = 'honey';
    case Swarm = 'swarm';
}