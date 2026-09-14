<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Collection;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\SharedKernel\Domain\Collection\Collection;

/**
 * @extends \HelloBees\SharedKernel\Domain\Collection\Collection<Apiary>
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