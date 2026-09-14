<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowProducts;

interface ShowProductsPresenter
{
    public function present(ShowProductsResponse $response): void;
}