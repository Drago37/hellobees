<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowProduct;

use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

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
     * @param \HelloBees\Sales\Domain\Entity\Product $product
     *
     * @return ShowProductResponse
     */
    public function setProduct(Product $product): ShowProductResponse
    {
        $this->product = $product;
        return $this;
    }

}