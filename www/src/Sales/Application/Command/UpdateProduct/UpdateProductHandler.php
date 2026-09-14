<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Command\UpdateProduct;

use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\Sales\Domain\Exception\ProductNotFoundException;
use HelloBees\Sales\Domain\Repository\ProductRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class UpdateProductHandler
{
    public function __construct(
        private ProductRepository $productRepository,
    ) {
    }

    /**
     * @throws ProductNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(UpdateProductCommand $command): Product
    {
        $product = $this->productRepository->find($command->uuid);

        if ($product === null) {
            throw ProductNotFoundException::withUuid($command->uuid);
        }

        $product
            ->setProductType($command->productType)
            ->setStockQuantity($command->stockQuantity)
            ->setPrice($command->price)
            ->setTitle($command->title)
            ->setDescription($command->description)
            ->setPathImage($command->pathImage);

        $this->productRepository->update($product);

        return $product;
    }
}
