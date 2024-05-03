<?php

declare(strict_types=1);

namespace HelloBees\Domain\Accounts\Collection;

use HelloBees\Domain\Accounts\Entity\Expense;
use HelloBees\Domain\SharedKernel\Collection\Collection;

/**
 * Class
 *
 * @class ExpenseCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends Collection<Expense>
 */
class ExpenseCollection extends Collection
{
    /**
     * @return class-string<Expense>
     */
    protected function itemClass(): string
    {
        return Expense::class;
    }
}