<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Collection;

use HelloBees\Domain\BeeKeeping\Entity\Beehive;
use HelloBees\Domain\SharedKernel\Collection\Collection;

/**
 * Class
 * @class BeehiveCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends Collection<Beehive>
 */
class BeehiveCollection extends Collection
{
    /**
     * @return class-string<Beehive>
     */
    protected function itemClass(): string
    {
        return Beehive::class;
    }
}