<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\Collection;

use HelloBees\Domain\Selling\Entity\Product;
use HelloBees\Domain\SharedKernel\Collection\Collection;

/**
 * Class
 * @class CustomerCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends Collection<Product>
 */
class ProductCollection extends Collection
{
    /**
     * @return class-string<Product>
     */
    protected function itemClass(): string
    {
        return Product::class;
    }
}