<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\Query\ListHarvestsByApiary;

use HelloBees\BeeKeeping\Domain\Exception\ApiaryNotFoundException;
use HelloBees\BeeKeeping\Domain\Repository\ApiaryRepository;
use HelloBees\Production\Application\Query\ShowHarvest\HarvestView;
use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\Production\Domain\Repository\HarvestRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class ListHarvestsByApiaryHandler
{
    public function __construct(
        private HarvestRepository $harvestRepository,
        private ApiaryRepository $apiaryRepository,
    ) {
    }

    /**
     * @return list<HarvestView>
     *
     * @throws ApiaryNotFoundException
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function __invoke(ListHarvestsByApiaryQuery $query): array
    {
        $apiary = $this->apiaryRepository->find($query->apiaryUuid);

        if ($apiary === null) {
            throw ApiaryNotFoundException::withUuid($query->apiaryUuid);
        }

        return array_map(
            static fn (Harvest $harvest): HarvestView => HarvestView::fromEntity($harvest),
            $this->harvestRepository->findByApiary($apiary)->values(),
        );
    }
}
