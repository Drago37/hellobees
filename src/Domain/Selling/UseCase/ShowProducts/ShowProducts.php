<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowProducts;

use HelloBees\Domain\Selling\Repository\ProductRepository;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 *
 * @class ShowProducts
 * @package HelloBees\Domain\Selling\UseCase\ShowProducts
 */
final readonly class ShowProducts
{
    /**
     * ShowProducts constructor
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(private ProductRepository $productRepository)
    {
    }

    /**
     * @param ShowProductsPresenter $presenter
     * @return void
     */
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