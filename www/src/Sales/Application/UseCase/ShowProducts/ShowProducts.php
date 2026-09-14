<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowProducts;

use HelloBees\Sales\Domain\Repository\ProductRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

final readonly class ShowProducts
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function execute(ShowProductsPresenter $presenter): void
    {
        $response = new ShowProductsResponse();
        try {
            $products = $this->productRepository->findAll();
            $response->setProducts($products);
        } catch (CollectionException|RepositoryException $e) {
            $response->setError(new ResponseError("products.find_all.failed", [], $e));
        }
        $presenter->present($response);
    }
}