<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowProduct;

use HelloBees\Domain\Selling\Repository\ProductRepository;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Class
 *
 * @class ShowProduct
 * @package HelloBees\Domain\Selling\UseCase\ShowProduct
 */
final readonly class ShowProduct
{
    /**
     * ShowProduct constructor
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(private ProductRepository $productRepository)
    {
    }

    /**
     * @param Uuid $productUuid
     * @param ShowProductPresenter $presenter
     * @return void
     */
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