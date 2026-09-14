<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\UseCase\AddBeekeeper;

use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

/**
 * Class
 * @class AddBeekeeperResponse
 * @package HelloBees\Domain\BeeKeeping\UseCase
 */
class AddBeekeeperResponse extends UseCaseResponse
{
    /**
     * @var \HelloBees\BeeKeeping\Domain\Entity\BeeKeeper
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
     * @param \HelloBees\BeeKeeping\Domain\Entity\BeeKeeper $beeKeeper
     *
     * @return $this
     */
    public function setBeeKeeper(BeeKeeper $beeKeeper): AddBeekeeperResponse
    {
        $this->beeKeeper = $beeKeeper;
        return $this;
    }
}