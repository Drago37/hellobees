<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Collection;

use HelloBees\Domain\BeeKeeping\Entity\Visit;
use HelloBees\Domain\SharedKernel\Collection\Collection;

/**
 * Class
 * @class VisitCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends Collection<Visit>
 */
class VisitCollection extends Collection
{
    /**
     * @return class-string<Visit>
     */
    protected function itemClass(): string
    {
        return Visit::class;
    }
}