<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\UseCase\ShowHarvestsByApiary;

use HelloBees\Domain\BeeKeeping\Aggregate\Apiary;
use HelloBees\Domain\Production\Repository\HarvestRepository;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 *
 * @class ShowHarvestsByApiary
 * @package HelloBees\Domain\Production\UseCase\ShowHarvestsByApiary
 */
final readonly class ShowHarvestsByApiary
{
    /**
     * ShowHarvestsByApiary constructor
     *
     * @param HarvestRepository $harvestRepository
     */
    public function __construct(private HarvestRepository $harvestRepository)
    {
    }

    /**
     * @param Apiary $apiary
     * @param ShowHarvestsByApiaryPresenter $presenter
     * @return void
     */
    public function execute(Apiary $apiary, ShowHarvestsByApiaryPresenter $presenter): void
    {
        $response = new ShowHarvestsByApiaryResponse();
        try {
            $harvests = $this->harvestRepository->findByApiary($apiary);
            $response->setHarvests($harvests);
        } catch (CollectionException|RepositoryException $e) {
            $response->setError(new ResponseError("harvest.find_by_apiary.failed", ['apiary' => $apiary], $e));
        }
        $presenter->present($response);
    }
}