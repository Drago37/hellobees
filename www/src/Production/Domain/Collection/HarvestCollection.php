<?php

declare(strict_types=1);

namespace HelloBees\Production\Domain\Collection;

use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\SharedKernel\Domain\Collection\Collection;

/**
 * @extends \HelloBees\SharedKernel\Domain\Collection\Collection<\HelloBees\Production\Domain\Entity\Harvest>
 */
class HarvestCollection extends \HelloBees\SharedKernel\Domain\Collection\Collection
{
    /**
     * @return class-string<\HelloBees\Production\Domain\Entity\Harvest>
     */
    protected function itemClass(): string
    {
        return Harvest::class;
    }
}