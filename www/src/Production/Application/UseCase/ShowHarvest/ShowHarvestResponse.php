<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\ShowHarvest;

use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowHarvestResponse
 * @package HelloBees\Domain\Production\UseCase\ShowHarvest
 */
class ShowHarvestResponse extends UseCaseResponse
{
    /**
     * @var \HelloBees\BeeKeeping\Domain\Production\Entity\Harvest
     */
    private Harvest $harvest;

    /**
     * @return \HelloBees\BeeKeeping\Domain\Production\Entity\Harvest
     */
    public function getHarvest(): Harvest
    {
        return $this->harvest;
    }

    /**
     * @param \HelloBees\Production\Domain\Entity\Harvest $harvest
     *
     * @return ShowHarvestResponse
     */
    public function setHarvest(Harvest $harvest): ShowHarvestResponse
    {
        $this->harvest = $harvest;
        return $this;
    }

}