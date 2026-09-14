<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowProducts;

use HelloBees\Sales\Domain\Collection\ProductCollection;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowProductsResponse
 * @package HelloBees\Domain\Selling\UseCase\ShowProducts
 */
class ShowProductsResponse extends UseCaseResponse
{
    /**
     * @var \HelloBees\Sales\Domain\Collection\ProductCollection
     */
    private ProductCollection $products;

    /**
     * @return \HelloBees\Sales\Domain\Collection\ProductCollection
     */
    public function getProducts(): ProductCollection
    {
        return $this->products;
    }

    /**
     * @param \HelloBees\Sales\Domain\Collection\ProductCollection $products
     *
     * @return ShowProductsResponse
     */
    public function setProducts(ProductCollection $products): ShowProductsResponse
    {
        $this->products = $products;
        return $this;
    }

}