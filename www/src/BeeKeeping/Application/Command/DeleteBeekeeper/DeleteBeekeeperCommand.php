<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\Command\DeleteBeekeeper;

use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class DeleteBeekeeperCommand
{
    public function __construct(
        public Uuid $uuid,
    ) {
    }
}
