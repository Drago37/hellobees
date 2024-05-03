<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\RemoveProduct;

use HelloBees\Domain\Selling\Entity\Product;
use HelloBees\Domain\Selling\Repository\ProductRepository;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 *
 * @class RemoveProduct
 * @package HelloBees\Domain\Selling\UseCase\RemoveProduct
 */
final readonly class RemoveProduct
{
    /**
     * RemoveProduct constructor
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(private ProductRepository $productRepository)
    {
    }

    /**
     * @param Product $product
     * @param RemoveProductPresenter $presenter
     * @return void
     */
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