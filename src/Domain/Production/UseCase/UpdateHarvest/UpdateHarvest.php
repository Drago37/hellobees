<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\UseCase\UpdateHarvest;

use HelloBees\Domain\Production\Entity\Harvest;
use HelloBees\Domain\Production\Repository\HarvestRepository;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 *
 * @class UpdateHarvest
 * @package HelloBees\Domain\Production\UseCase\UpdateHarvest
 */
final readonly class UpdateHarvest
{
    /**
     * UpdateHarvest constructor
     *
     * @param HarvestRepository $harvestRepository
     */
    public function __construct(private HarvestRepository $harvestRepository)
    {
    }

    /**
     * @param Harvest $harvest
     * @param UpdateHarvestPresenter $presenter
     * @return void
     */
    public function execute(Harvest $harvest, UpdateHarvestPresenter $presenter): void
    {
        $response = new UpdateHarvestResponse();
        try {
            $this->harvestRepository->update($harvest);
        } catch (RepositoryException $e) {
            $response->setError(new ResponseError("harvest.update.failed", ['harvest' => $harvest], $e));
        }
        $presenter->present($response);
    }
}