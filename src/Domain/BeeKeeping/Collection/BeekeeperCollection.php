<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Collection;

use HelloBees\Domain\BeeKeeping\Entity\BeeKeeper;
use HelloBees\Domain\SharedKernel\Collection\Collection;

/**
 * Class
 * @class BeekeeperCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends Collection<BeeKeeper>
 */
class BeekeeperCollection extends Collection
{
    /**
     * @return class-string<BeeKeeper>
     */
    protected function itemClass(): string
    {
        return BeeKeeper::class;
    }
}