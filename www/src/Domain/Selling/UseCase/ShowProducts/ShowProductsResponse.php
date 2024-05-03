<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowProducts;

use HelloBees\Domain\Selling\Collection\ProductCollection;
use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowProductsResponse
 * @package HelloBees\Domain\Selling\UseCase\ShowProducts
 */
class ShowProductsResponse extends UseCaseResponse
{
    /**
     * @var ProductCollection
     */
    private ProductCollection $products;

    /**
     * @return ProductCollection
     */
    public function getProducts(): ProductCollection
    {
        return $this->products;
    }

    /**
     * @param ProductCollection $products
     * @return ShowProductsResponse
     */
    public function setProducts(ProductCollection $products): ShowProductsResponse
    {
        $this->products = $products;
        return $this;
    }

}