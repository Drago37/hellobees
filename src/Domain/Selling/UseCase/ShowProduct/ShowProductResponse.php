<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowProduct;

use HelloBees\Domain\Selling\Entity\Product;
use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowProductResponse
 * @package HelloBees\Domain\Selling\UseCase\ShowProduct
 */
class ShowProductResponse extends UseCaseResponse
{
    /** @var Product */
    private Product $product;

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     * @return ShowProductResponse
     */
    public function setProduct(Product $product): ShowProductResponse
    {
        $this->product = $product;
        return $this;
    }

}