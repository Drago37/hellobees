<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\Query\ShowBeekeeper;

use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;

final readonly class BeekeeperView
{
    public function __construct(
        public string $uuid,
        public string $napiNumber,
        public string $username,
        public string $email,
        public string $type,
        public string $created,
    ) {
    }

    public static function fromEntity(BeeKeeper $beeKeeper): self
    {
        return new self(
            (string) $beeKeeper->getUuid(),
            (string) $beeKeeper->getNumeroNapi(),
            $beeKeeper->getUsername()->getFullName(),
            (string) $beeKeeper->getEmail(),
            $beeKeeper->getType()->value,
            $beeKeeper->getCreated()->toString(),
        );
    }
}
