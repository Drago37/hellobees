<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\UpdateProduct;

/**
 * Interface
 *
 * @class UpdateProductPresenter
 * @package HelloBees\Domain\Selling\UseCase\UpdateProduct
 */
interface UpdateProductPresenter
{
    /**
     * @param UpdateProductResponse $response
     * @return void
     */
    public function present(UpdateProductResponse $response): void;
}