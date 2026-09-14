<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Query\ListProducts;

use HelloBees\Sales\Application\Query\ShowProduct\ProductView;
use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\Sales\Domain\Repository\ProductRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class ListProductsHandler
{
    public function __construct(
        private ProductRepository $productRepository,
    ) {
    }

    /**
     * @return list<ProductView>
     *
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function __invoke(ListProductsQuery $query): array
    {
        return array_map(
            static fn (Product $product): ProductView => ProductView::fromEntity($product),
            $this->productRepository->findAll()->values(),
        );
    }
}
