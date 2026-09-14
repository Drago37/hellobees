<?php

declare(strict_types=1);

namespace HelloBees\Accounts\Domain\Collection;

use HelloBees\Accounts\Domain\Entity\Credit;
use HelloBees\SharedKernel\Domain\Collection\Collection;

/**
 * @extends \HelloBees\SharedKernel\Domain\Collection\Collection<Resource>
 */
class ResourceCollection extends \HelloBees\SharedKernel\Domain\Collection\Collection
{
    /**
     * @return class-string<\HelloBees\Accounts\Domain\Entity\Credit>
     */
    protected function itemClass(): string
    {
        return Credit::class;
    }
}