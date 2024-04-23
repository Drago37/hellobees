<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\Collection;

use HelloBees\Domain\Production\Entity\Harvest;
use HelloBees\Domain\SharedKernel\Collection\Collection;

/**
 * Class
 * @class HarvestCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends Collection<Harvest>
 */
class HarvestCollection extends Collection
{
    /**
     * @return class-string<Harvest>
     */
    protected function itemClass(): string
    {
        return Harvest::class;
    }
}