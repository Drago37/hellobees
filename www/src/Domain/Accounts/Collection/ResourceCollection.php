<?php

declare(strict_types=1);

namespace HelloBees\Domain\Accounts\Collection;

use HelloBees\Domain\Accounts\Entity\Credit;
use HelloBees\Domain\SharedKernel\Collection\Collection;

/**
 * Class
 *
 * @class ResourceCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends Collection<Resource>
 */
class ResourceCollection extends Collection
{
    /**
     * @return class-string<Credit>
     */
    protected function itemClass(): string
    {
        return Credit::class;
    }
}