<?php

declare(strict_types=1);

namespace HelloBees\Sales\Domain\Collection;

use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\SharedKernel\Domain\Collection\Collection;

/**
 * Class
 * @class CustomerCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends Collection<\HelloBees\Sales\Domain\Entity\Customer>
 */
class CustomerCollection extends \HelloBees\SharedKernel\Domain\Collection\Collection
{
    /**
     * @return class-string<\HelloBees\Sales\Domain\Entity\Customer>
     */
    protected function itemClass(): string
    {
        return Customer::class;
    }
}