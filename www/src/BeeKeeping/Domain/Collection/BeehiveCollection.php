<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Collection;

use HelloBees\BeeKeeping\Domain\Entity\Beehive;
use HelloBees\SharedKernel\Domain\Collection\Collection;

/**
 * @extends Collection<Beehive>
 */
class BeehiveCollection extends \HelloBees\SharedKernel\Domain\Collection\Collection
{
    /**
     * @return class-string<\HelloBees\BeeKeeping\Domain\Entity\Beehive>
     */
    protected function itemClass(): string
    {
        return Beehive::class;
    }
}