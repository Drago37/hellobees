<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowProducts;

use HelloBees\Sales\Domain\Collection\ProductCollection;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

class ShowProductsResponse extends UseCaseResponse
{
    private ProductCollection $products;

    public function getProducts(): ProductCollection
    {
        return $this->products;
    }

    public function setProducts(ProductCollection $products): ShowProductsResponse
    {
        $this->products = $products;
        return $this;
    }

}