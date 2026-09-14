<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowProduct;

interface ShowProductPresenter
{
    public function present(ShowProductResponse $response): void;
}