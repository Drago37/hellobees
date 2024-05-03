<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\Collection;

use HelloBees\Domain\Selling\Entity\Customer;
use HelloBees\Domain\SharedKernel\Collection\Collection;

/**
 * Class
 * @class CustomerCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends Collection<Customer>
 */
class CustomerCollection extends Collection
{
    /**
     * @return class-string<Customer>
     */
    protected function itemClass(): string
    {
        return Customer::class;
    }
}