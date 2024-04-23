<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\UseCase\ShowHarvest;

use HelloBees\Domain\Production\Repository\HarvestRepository;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Class
 *
 * @class ShowHarvest
 * @package HelloBees\Domain\Production\UseCase\ShowHarvest
 */
final readonly class ShowHarvest
{
    /**
     * ShowHarvest constructor
     *
     * @param HarvestRepository $harvestRepository
     */
    public function __construct(private HarvestRepository $harvestRepository)
    {
    }

    /**
     * @param Uuid $harvestUuid
     * @param ShowHarvestPresenter $presenter
     * @return void
     */
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