<?php

declare(strict_types=1);

namespace HelloBees\Sales\Domain\Collection;

use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\SharedKernel\Domain\Collection\Collection;

/**
 * @extends Collection<Command>
 */
class CommandCollection extends Collection
{
    /**
     * @return class-string<Command>
     */
    protected function itemClass(): string
    {
        return Command::class;
    }
}