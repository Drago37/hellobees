<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\AddProduct;

use HelloBees\Domain\Selling\Entity\Product;
use HelloBees\Domain\Selling\Repository\ProductRepository;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

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
     * @param ProductRepository $productRepository
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