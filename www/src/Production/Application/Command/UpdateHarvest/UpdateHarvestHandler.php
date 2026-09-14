<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\Command\UpdateHarvest;

use HelloBees\BeeKeeping\Domain\Exception\ApiaryNotFoundException;
use HelloBees\BeeKeeping\Domain\Repository\ApiaryRepository;
use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\Production\Domain\Exception\HarvestNotFoundException;
use HelloBees\Production\Domain\Repository\HarvestRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class UpdateHarvestHandler
{
    public function __construct(
        private HarvestRepository $harvestRepository,
        private ApiaryRepository $apiaryRepository,
    ) {
    }

    /**
     * @throws ApiaryNotFoundException
     * @throws HarvestNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(UpdateHarvestCommand $command): Harvest
    {
        $harvest = $this->harvestRepository->find($command->uuid);

        if ($harvest === null) {
            throw HarvestNotFoundException::withUuid($command->uuid);
        }

        $apiary = $this->apiaryRepository->find($command->apiaryUuid);

        if ($apiary === null) {
            throw ApiaryNotFoundException::withUuid($command->apiaryUuid);
        }

        $harvest
            ->setHarvestDate($command->harvestDate)
            ->setHoneyType($command->honeyType)
            ->setQuantity($command->quantity)
            ->setApiary($apiary);

        $this->harvestRepository->update($harvest);

        return $harvest;
    }
}
