<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\RemoveProduct;

interface RemoveProductPresenter
{
    public function present(RemoveProductResponse $response): void;
}