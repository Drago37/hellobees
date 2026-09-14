<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\ShowHarvest;

use HelloBees\Production\Domain\Repository\HarvestRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class ShowHarvest
{
    public function __construct(private HarvestRepository $harvestRepository)
    {
    }

    public function execute(Uuid $harvestUuid, ShowHarvestPresenter $presenter): void
    {
        $response = new ShowHarvestResponse();
        try {
            $harvest = $this->harvestRepository->find($harvestUuid);
            if (is_null($harvest)) {
                $response->setError(new ResponseError("harvest.not.found", ['uuid' => $harvestUuid]));
            } else {
                $response->setHarvest($harvest);
            }
        } catch (RepositoryException $e) {
            $response->setError(new ResponseError("harvest.find.failed", ['uuid' => $harvestUuid], $e));
        }
        $presenter->present($response);
    }
}