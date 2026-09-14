<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\Query\ListHarvests;

use HelloBees\Production\Application\Query\ShowHarvest\HarvestView;
use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\Production\Domain\Repository\HarvestRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class ListHarvestsHandler
{
    public function __construct(
        private HarvestRepository $harvestRepository,
    ) {
    }

    /**
     * @return list<HarvestView>
     *
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function __invoke(ListHarvestsQuery $query): array
    {
        return array_map(
            static fn (Harvest $harvest): HarvestView => HarvestView::fromEntity($harvest),
            $this->harvestRepository->findAll()->values(),
        );
    }
}
