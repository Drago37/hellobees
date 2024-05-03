<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\Collection;

use HelloBees\Domain\SharedKernel\Collection\Collection;
use HelloBees\Domain\Trace\Entity\Trace;

/**
 * Class
 * @class TraceCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends Collection<Trace>
 */
class TraceCollection extends Collection
{
    /**
     * @return class-string<Trace>
     */
    protected function itemClass(): string
    {
        return Trace::class;
    }
}