<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\UseCase\ShowHarvests;

use HelloBees\Domain\Production\Repository\HarvestRepository;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 *
 * @class ShowHarvests
 * @package HelloBees\Domain\Production\UseCase\ShowHarvests
 */
final readonly class ShowHarvests
{
    /**
     * ShowHarvests constructor
     *
     * @param HarvestRepository $harvestRepository
     */
    public function __construct(private HarvestRepository $harvestRepository)
    {
    }

    /**
     * @param ShowHarvestsPresenter $presenter
     * @return void
     */
    public function execute(ShowHarvestsPresenter $presenter): void
    {
        $response = new ShowHarvestsResponse();
        try {
            $harvests = $this->harvestRepository->findAll();
            $response->setHarvests($harvests);
        } catch (CollectionException|RepositoryException $e) {
            $response->setError(new ResponseError("harvest.find_all.failed", [], $e));
        }
        $presenter->present($response);
    }
}