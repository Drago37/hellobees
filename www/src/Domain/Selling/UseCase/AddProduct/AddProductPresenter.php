<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\AddProduct;

/**
 * Interface
 *
 * @class AddProductPresenter
 * @package HelloBees\Domain\Selling\UseCase\AddProduct
 */
interface AddProductPresenter
{
    /**
     * @param AddProductResponse $response
     * @return void
     */
    public function present(AddProductResponse $response): void;
}