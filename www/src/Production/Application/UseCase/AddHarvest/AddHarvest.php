<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\AddHarvest;

use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\Production\Domain\Repository\HarvestRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

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
     * @param \HelloBees\BeeKeeping\Domain\Production\Repository\\HelloBees\Production\Domain\Repository\HarvestRepository $harvestRepository
     */
    public function __construct(private HarvestRepository $harvestRepository)
    {
    }

    /**
     * @param \HelloBees\Production\Domain\Entity\Harvest $harvest
     * @param AddHarvestPresenter $presenter
     *
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