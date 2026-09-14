<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\UpdateHarvest;

use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\Production\Domain\Repository\HarvestRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

final readonly class UpdateHarvest
{
    public function __construct(private HarvestRepository $harvestRepository)
    {
    }

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