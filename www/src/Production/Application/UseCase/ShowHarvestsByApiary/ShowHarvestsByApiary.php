<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\ShowHarvestsByApiary;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\Production\Domain\Repository\HarvestRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

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
     * @param \HelloBees\BeeKeeping\Domain\Aggregate\Apiary $apiary
     * @param ShowHarvestsByApiaryPresenter $presenter
     *
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