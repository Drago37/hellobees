<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\AddProduct;

use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\Sales\Domain\Repository\ProductRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

/**
 * Class
 *
 * @class AddProduct
 * @package HelloBees\Domain\Selling\UseCase\AddProduct
 */
final readonly class AddProduct
{
    /**
     * AddProduct constructor
     *
     * @param \HelloBees\Sales\Domain\Repository\ProductRepository $productRepository
     */
    public function __construct(private ProductRepository $productRepository)
    {
    }

    /**
     * @param Product $product
     * @param AddProductPresenter $presenter
     * @return void
     */
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