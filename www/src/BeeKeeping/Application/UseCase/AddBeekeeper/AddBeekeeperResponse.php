<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\UseCase\AddBeekeeper;

use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

class AddBeekeeperResponse extends UseCaseResponse
{
    private BeeKeeper $beeKeeper;

    public function getBeeKeeper(): BeeKeeper
    {
        return $this->beeKeeper;
    }

    public function setBeeKeeper(BeeKeeper $beeKeeper): AddBeekeeperResponse
    {
        $this->beeKeeper = $beeKeeper;
        return $this;
    }
}