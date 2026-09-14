<?php

declare(strict_types=1);

namespace HelloBees\Accounts\Domain\Collection;

use HelloBees\Accounts\Domain\Entity\Expense;
use HelloBees\SharedKernel\Domain\Collection\Collection;

/**
 * Class
 *
 * @class ExpenseCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends Collection<\HelloBees\Accounts\Domain\Entity\Expense>
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