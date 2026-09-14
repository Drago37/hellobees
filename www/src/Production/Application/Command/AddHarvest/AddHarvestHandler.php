<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\Command\AddHarvest;

use HelloBees\BeeKeeping\Domain\Exception\ApiaryNotFoundException;
use HelloBees\BeeKeeping\Domain\Repository\ApiaryRepository;
use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\Production\Domain\Repository\HarvestRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class AddHarvestHandler
{
    public function __construct(
        private HarvestRepository $harvestRepository,
        private ApiaryRepository $apiaryRepository,
    ) {
    }

    /**
     * @throws ApiaryNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(AddHarvestCommand $command): Harvest
    {
        $apiary = $this->apiaryRepository->find($command->apiaryUuid);

        if ($apiary === null) {
            throw ApiaryNotFoundException::withUuid($command->apiaryUuid);
        }

        $harvest = new Harvest(
            Uuid::generate(),
            DateTime::now(),
            $command->harvestDate,
            $command->honeyType,
            $command->quantity,
            $apiary,
        );

        $this->harvestRepository->insert($harvest);

        return $harvest;
    }
}
