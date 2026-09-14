<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\Query\ShowHarvest;

use HelloBees\Production\Domain\Entity\Harvest;

final readonly class HarvestView
{
    public function __construct(
        public string $uuid,
        public string $created,
        public string $harvestDate,
        public string $honeyType,
        public int $quantity,
        public string $apiaryUuid,
    ) {
    }

    public static function fromEntity(Harvest $harvest): self
    {
        return new self(
            (string) $harvest->getUuid(),
            $harvest->getCreated()->toString(),
            $harvest->getHarvestDate()->toString(),
            $harvest->getHoneyType()->value,
            $harvest->getQuantity(),
            (string) $harvest->getApiary()->getUuid(),
        );
    }
}
