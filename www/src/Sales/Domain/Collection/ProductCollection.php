<?php

declare(strict_types=1);

namespace HelloBees\Sales\Domain\Collection;

use HelloBees\Sales\Domain\Entity\Product;

/**
 * Class
 * @class CustomerCollection
 * @package HelloBees\Domain\BeeKeeping\Collection
 * @extends \HelloBees\SharedKernel\Domain\Collection\Collection<Product>
 */
class ProductCollection extends \HelloBees\SharedKernel\Domain\Collection\Collection
{
    /**
     * @return class-string<Product>
     */
    protected function itemClass(): string
    {
        return Product::class;
    }
}