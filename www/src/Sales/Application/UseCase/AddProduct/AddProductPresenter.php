<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\AddProduct;

interface AddProductPresenter
{
    public function present(AddProductResponse $response): void;
}