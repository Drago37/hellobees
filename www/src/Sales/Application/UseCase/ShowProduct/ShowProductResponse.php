<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowProduct;

use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

class ShowProductResponse extends UseCaseResponse
{
    private Product $product;

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): ShowProductResponse
    {
        $this->product = $product;
        return $this;
    }

}