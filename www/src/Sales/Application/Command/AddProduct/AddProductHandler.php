<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Command\AddProduct;

use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\Sales\Domain\Repository\ProductRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class AddProductHandler
{
    public function __construct(
        private ProductRepository $productRepository,
    ) {
    }

    /**
     * @throws RepositoryException
     */
    public function __invoke(AddProductCommand $command): Product
    {
        $product = new Product(
            Uuid::generate(),
            $command->productType,
            $command->stockQuantity,
            $command->price,
            $command->title,
            $command->description,
            $command->pathImage,
            DateTime::now(),
        );

        $this->productRepository->insert($product);

        return $product;
    }
}
