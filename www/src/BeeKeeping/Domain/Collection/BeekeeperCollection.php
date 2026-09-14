<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Collection;

use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\SharedKernel\Domain\Collection\Collection;

/**
 * @extends \HelloBees\SharedKernel\Domain\Collection\Collection<BeeKeeper>
 */
class BeekeeperCollection extends \HelloBees\SharedKernel\Domain\Collection\Collection
{
    /**
     * @return class-string<BeeKeeper>
     */
    protected function itemClass(): string
    {
        return BeeKeeper::class;
    }
}