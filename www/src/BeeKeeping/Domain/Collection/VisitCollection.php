<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Collection;

use HelloBees\BeeKeeping\Domain\Entity\Visit;
use HelloBees\SharedKernel\Domain\Collection\Collection;

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