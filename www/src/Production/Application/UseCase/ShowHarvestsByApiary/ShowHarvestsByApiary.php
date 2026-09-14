<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\ShowHarvestsByApiary;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\Production\Domain\Repository\HarvestRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

final readonly class ShowHarvestsByApiary
{
    public function __construct(private HarvestRepository $harvestRepository)
    {
    }

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