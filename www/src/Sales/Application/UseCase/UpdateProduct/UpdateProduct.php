<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\UpdateProduct;

use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\Sales\Domain\Repository\ProductRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

final readonly class UpdateProduct
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function execute(Product $product, UpdateProductPresenter $presenter): void
    {
        $response = new UpdateProductResponse();
        try {
            $this->productRepository->update($product);
        } catch (RepositoryException $e) {
            $response->setError(new ResponseError("product.update.failed", ['product' => $product], $e));
        }
        $presenter->present($response);
    }
}