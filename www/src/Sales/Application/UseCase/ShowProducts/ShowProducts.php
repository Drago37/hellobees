<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowProducts;

use HelloBees\Sales\Domain\Repository\ProductRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

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