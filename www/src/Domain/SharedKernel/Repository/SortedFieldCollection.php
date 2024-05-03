<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\Repository;

use HelloBees\Domain\SharedKernel\Collection\Collection;

/**
 * Class
 *
 * @class   SortedFieldCollection
 * @package HelloBees\Domain\SharedKernel\Repository
 * @extends Collection<SortedField>
 */
class SortedFieldCollection extends Collection
{
    /**
     * @return class-string<SortedField>
     */
    protected function itemClass(): string
    {
        return SortedField::class;
    }
}
