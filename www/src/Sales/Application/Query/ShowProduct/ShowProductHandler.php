<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Query\ShowProduct;

use HelloBees\Sales\Domain\Exception\ProductNotFoundException;
use HelloBees\Sales\Domain\Repository\ProductRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class ShowProductHandler
{
    public function __construct(
        private ProductRepository $productRepository,
    ) {
    }

    /**
     * @throws ProductNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(ShowProductQuery $query): ProductView
    {
        $product = $this->productRepository->find($query->uuid);

        if ($product === null) {
            throw ProductNotFoundException::withUuid($query->uuid);
        }

        return ProductView::fromEntity($product);
    }
}
