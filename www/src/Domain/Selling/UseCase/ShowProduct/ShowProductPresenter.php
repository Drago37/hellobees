<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowProduct;

/**
 * Interface
 *
 * @class ShowProductPresenter
 * @package HelloBees\Domain\Selling\UseCase\ShowProduct
 */
interface ShowProductPresenter
{
    /**
     * @param ShowProductResponse $response
     * @return void
     */
    public function present(ShowProductResponse $response): void;
}