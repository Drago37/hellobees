<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\UseCase\AddBeekeeper;


use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;

class AddBeekeeperRequest
{
    public function __construct(
        public BeeKeeper $beeKeeper
    )
    {
    }

    public function getBeeKeeper(): BeeKeeper
    {
        return $this->beeKeeper;
    }

    public function setBeeKeeper(BeeKeeper $beeKeeper): AddBeekeeperRequest
    {
        $this->beeKeeper = $beeKeeper;
        return $this;
    }
}