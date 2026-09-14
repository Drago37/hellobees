<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\UpdateProduct;

interface UpdateProductPresenter
{
    public function present(UpdateProductResponse $response): void;
}