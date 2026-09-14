<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\UpdateProduct;

use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\Sales\Domain\Repository\ProductRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

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
     * @param \HelloBees\Sales\Domain\Repository\ProductRepository $productRepository
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