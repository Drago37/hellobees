<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\Command\AddBeekeeper;

use HelloBees\BeeKeeping\Domain\Enum\BeeKeeperType;
use HelloBees\BeeKeeping\Domain\ValueObject\NapiNumber;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;

final readonly class AddBeekeeperCommand
{
    public function __construct(
        public NapiNumber $napiNumber,
        public Username $username,
        public Email $email,
        public BeeKeeperType $type,
    ) {
    }
}
