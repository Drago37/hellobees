<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\AddProduct;

use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\Sales\Domain\Repository\ProductRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

final readonly class AddProduct
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function execute(Product $product, AddProductPresenter $presenter): void
    {
        $response = new AddProductResponse();
        try {
            $this->productRepository->insert($product);
        } catch (RepositoryException $e) {
            $response->setError(new ResponseError('product.add.failed', ['product' => $product], $e));
        }
        $presenter->present($response);
    }
}