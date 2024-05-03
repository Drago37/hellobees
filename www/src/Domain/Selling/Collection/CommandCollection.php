<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\Collection;

use HelloBees\Domain\Selling\Entity\Command;
use HelloBees\Domain\SharedKernel\Collection\Collection;

/**
 * Class
 * @class CommandCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
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