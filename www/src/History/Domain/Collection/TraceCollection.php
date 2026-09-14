<?php

declare(strict_types=1);

namespace HelloBees\History\Domain\Collection;

use HelloBees\History\Domain\Entity\Trace;
use HelloBees\SharedKernel\Domain\Collection\Collection;

/**
 * Class
 * @class TraceCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends \HelloBees\SharedKernel\Domain\Collection\Collection<\HelloBees\History\Domain\Entity\Trace>
 */
class TraceCollection extends Collection
{
    /**
     * @return class-string<\HelloBees\History\Domain\Entity\Trace>
     */
    protected function itemClass(): string
    {
        return Trace::class;
    }
}