<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Command\RemoveProduct;

use HelloBees\Sales\Domain\Exception\ProductNotFoundException;
use HelloBees\Sales\Domain\Repository\ProductRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class RemoveProductHandler
{
    public function __construct(
        private ProductRepository $productRepository,
    ) {
    }

    /**
     * @throws ProductNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(RemoveProductCommand $command): void
    {
        $product = $this->productRepository->find($command->uuid);

        if ($product === null) {
            throw ProductNotFoundException::withUuid($command->uuid);
        }

        $this->productRepository->delete($product);
    }
}
