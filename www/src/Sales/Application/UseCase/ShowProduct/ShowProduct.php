<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowProduct;

use HelloBees\Sales\Domain\Repository\ProductRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class ShowProduct
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function execute(Uuid $productUuid, ShowProductPresenter $presenter): void
    {
        $response = new ShowProductResponse();
        try {
            $product = $this->productRepository->find($productUuid);
            if (is_null($product)) {
                $response->setError(new ResponseError("harvest.not.found", ['uuid' => $productUuid]));
            } else {
                $response->setProduct($product);
            }
        } catch (RepositoryException $e) {
            $response->setError(new ResponseError("product.find.failed", ['uuid' => $productUuid], $e));
        }
        $presenter->present($response);
    }
}