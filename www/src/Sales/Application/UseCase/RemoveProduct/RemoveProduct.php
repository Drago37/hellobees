<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\RemoveProduct;

use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\Sales\Domain\Repository\ProductRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

final readonly class RemoveProduct
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function execute(Product $product, RemoveProductPresenter $presenter): void
    {
        $response = new RemoveProductResponse();
        try {
            $this->productRepository->delete($product);
        } catch (RepositoryException $e) {
            $response->setError(new ResponseError("product.remove.failed", ['product' => $product], $e));
        }
        $presenter->present($response);
    }
}