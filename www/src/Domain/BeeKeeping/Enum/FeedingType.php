<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Enum;

/**
 * Enum
 *
 * @class FeedingType
 * @package HelloBees\Domain\BeeKeeping\Enum
 */
enum FeedingType: string
{
    case BeeCandy = 'candy';
    case FeedSyrup = 'feed_syrup';
    case SpeculationSyrup = 'speculation_syrup';
}
