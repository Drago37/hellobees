<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\UseCase\AddBeekeeper;


use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;

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
     * @return \HelloBees\BeeKeeping\Domain\Entity\BeeKeeper
     */
    public function getBeeKeeper(): BeeKeeper
    {
        return $this->beeKeeper;
    }

    /**
     * @param \HelloBees\BeeKeeping\Domain\Entity\BeeKeeper $beeKeeper
     *
     * @return $this
     */
    public function setBeeKeeper(BeeKeeper $beeKeeper): AddBeekeeperRequest
    {
        $this->beeKeeper = $beeKeeper;
        return $this;
    }
}