<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Collection;

use HelloBees\Domain\BeeKeeping\Entity\Feeding;
use HelloBees\Domain\SharedKernel\Collection\Collection;

/**
 * Class
 * @class FeedingCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends Collection<Feeding>
 */
class FeedingCollection extends Collection
{
    /**
     * @return class-string<Feeding>
     */
    protected function itemClass(): string
    {
        return Feeding::class;
    }
}