<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\Query\ShowHarvest;

use HelloBees\Production\Domain\Exception\HarvestNotFoundException;
use HelloBees\Production\Domain\Repository\HarvestRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class ShowHarvestHandler
{
    public function __construct(
        private HarvestRepository $harvestRepository,
    ) {
    }

    /**
     * @throws HarvestNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(ShowHarvestQuery $query): HarvestView
    {
        $harvest = $this->harvestRepository->find($query->uuid);

        if ($harvest === null) {
            throw HarvestNotFoundException::withUuid($query->uuid);
        }

        return HarvestView::fromEntity($harvest);
    }
}
