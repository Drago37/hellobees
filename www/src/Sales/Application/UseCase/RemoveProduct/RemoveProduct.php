<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\RemoveProduct;

use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\Sales\Domain\Repository\ProductRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

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
     * @param \HelloBees\Sales\Domain\Entity\Product $product
     * @param RemoveProductPresenter $presenter
     *
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