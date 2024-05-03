<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\UpdateProduct;

use HelloBees\Domain\Selling\Entity\Product;
use HelloBees\Domain\Selling\Repository\ProductRepository;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 *
 * @class UpdateProduct
 * @package HelloBees\Domain\Selling\UseCase\UpdateProduct
 */
final readonly class UpdateProduct
{
    /**
     * UpdateProduct constructor
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(private ProductRepository $productRepository)
    {
    }

    /**
     * @param Product $product
     * @param UpdateProductPresenter $presenter
     * @return void
     */
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