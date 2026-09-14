<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Enum;

enum FeedingType: string
{
    case BeeCandy = 'candy';
    case FeedSyrup = 'feed_syrup';
    case SpeculationSyrup = 'speculation_syrup';
}
