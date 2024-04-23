<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\UseCase\AddBeekeeper;

use HelloBees\Domain\BeeKeeping\Entity\BeeKeeper;
use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;

/**
 * Class
 * @class AddBeekeeperResponse
 * @package HelloBees\Domain\BeeKeeping\UseCase
 */
class AddBeekeeperResponse extends UseCaseResponse
{
    /**
     * @var BeeKeeper
     */
    private BeeKeeper $beeKeeper;

    /**
     * @return BeeKeeper
     */
    public function getBeeKeeper(): BeeKeeper
    {
        return $this->beeKeeper;
    }

    /**
     * @param BeeKeeper $beeKeeper
     * @return $this
     */
    public function setBeeKeeper(BeeKeeper $beeKeeper): AddBeekeeperResponse
    {
        $this->beeKeeper = $beeKeeper;
        return $this;
    }
}