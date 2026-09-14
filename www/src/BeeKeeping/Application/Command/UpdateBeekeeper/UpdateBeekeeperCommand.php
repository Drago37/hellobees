<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\Command\UpdateBeekeeper;

use HelloBees\BeeKeeping\Domain\Enum\BeeKeeperType;
use HelloBees\BeeKeeping\Domain\ValueObject\NapiNumber;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class UpdateBeekeeperCommand
{
    public function __construct(
        public Uuid $uuid,
        public NapiNumber $napiNumber,
        public Username $username,
        public Email $email,
        public BeeKeeperType $type,
    ) {
    }
}
