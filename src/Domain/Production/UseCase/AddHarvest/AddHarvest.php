<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\UseCase\AddHarvest;

use HelloBees\Domain\Production\Entity\Harvest;
use HelloBees\Domain\Production\Repository\HarvestRepository;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 *
 * @class AddHarvest
 * @package HelloBees\Domain\Production\UseCase\AddHarvest
 */
final readonly class AddHarvest
{
    /**
     * AddHarvest constructor
     *
     * @param HarvestRepository $harvestRepository
     */
    public function __construct(private HarvestRepository $harvestRepository)
    {
    }

    /**
     * @param Harvest $harvest
     * @param AddHarvestPresenter $presenter
     * @return void
     */
    public function execute(Harvest $harvest, AddHarvestPresenter $presenter): void
    {
        $response = new AddHarvestResponse();
        try {
            $this->harvestRepository->insert($harvest);
        } catch (RepositoryException $e) {
            $response->setError(new ResponseError("harvest.add.failed", ['harvest' => $harvest], $e));
        }
        $presenter->present($response);
    }
}