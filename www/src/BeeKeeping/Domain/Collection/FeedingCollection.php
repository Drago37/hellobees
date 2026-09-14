<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Collection;

use HelloBees\BeeKeeping\Domain\Entity\Feeding;
use HelloBees\SharedKernel\Domain\Collection\Collection;

/**
 * Class
 * @class FeedingCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends \HelloBees\SharedKernel\Domain\Collection\Collection<Feeding>
 */
class FeedingCollection extends \HelloBees\SharedKernel\Domain\Collection\Collection
{
    /**
     * @return class-string<Feeding>
     */
    protected function itemClass(): string
    {
        return Feeding::class;
    }
}