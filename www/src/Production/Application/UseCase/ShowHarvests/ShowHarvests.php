<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\ShowHarvests;

use HelloBees\Production\Domain\Repository\HarvestRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

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