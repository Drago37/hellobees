<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Collection;

use HelloBees\Domain\BeeKeeping\Aggregate\Apiary;
use HelloBees\Domain\SharedKernel\Collection\Collection;

/**
 * Class
 * @class ApiaryCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends Collection<Apiary>
 */
class ApiaryCollection extends Collection
{
    /**
     * @return class-string<Apiary>
     */
    protected function itemClass(): string
    {
        return Apiary::class;
    }
}