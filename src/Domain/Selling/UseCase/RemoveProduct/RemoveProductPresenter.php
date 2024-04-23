<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\RemoveProduct;

/**
 * Interface
 *
 * @class RemoveProductPresenter
 * @package HelloBees\Domain\Selling\UseCase\RemoveProduct
 */
interface RemoveProductPresenter
{
    /**
     * @param RemoveProductResponse $response
     * @return void
     */
    public function present(RemoveProductResponse $response): void;
}