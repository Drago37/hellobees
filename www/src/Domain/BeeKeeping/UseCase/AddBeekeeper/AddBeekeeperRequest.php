<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\UseCase\AddBeekeeper;


use HelloBees\Domain\BeeKeeping\Entity\BeeKeeper;

/**
 * Class
 * @class AddBeekeeperRequest
 * @package HelloBees\Domain\BeeKeeping\UseCase
 */
class AddBeekeeperRequest
{
    /**
     * AddBeekeeperRequest constructor
     *
     * @param BeeKeeper $beeKeeper
     */
    public function __construct(
        public BeeKeeper $beeKeeper
    )
    {
    }

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
    public function setBeeKeeper(BeeKeeper $beeKeeper): AddBeekeeperRequest
    {
        $this->beeKeeper = $beeKeeper;
        return $this;
    }
}