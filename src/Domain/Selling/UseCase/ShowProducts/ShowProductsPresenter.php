<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowProducts;

/**
 * Interface
 *
 * @class ShowProductsPresenter
 * @package HelloBees\Domain\Selling\UseCase\ShowProducts
 */
interface ShowProductsPresenter
{
    /**
     * @param ShowProductsResponse $response
     * @return void
     */
    public function present(ShowProductsResponse $response): void;
}