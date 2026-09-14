<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\Command\UpdateHarvest;

use HelloBees\SharedKernel\Domain\Enum\HoneyType;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class UpdateHarvestCommand
{
    public function __construct(
        public Uuid $uuid,
        public DateTime $harvestDate,
        public HoneyType $honeyType,
        public int $quantity,
        public Uuid $apiaryUuid,
    ) {
    }
}
