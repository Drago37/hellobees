<?php

declare(strict_types=1);

namespace HelloBees\Domain\Accounts\Collection;

use HelloBees\Domain\Accounts\Entity\Resource;
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
     * @return class-string<Resource>
     */
    protected function itemClass(): string
    {
        return Resource::class;
    }
}