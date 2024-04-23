<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\UseCase\ShowHarvest;

use HelloBees\Domain\Production\Entity\Harvest;
use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowHarvestResponse
 * @package HelloBees\Domain\Production\UseCase\ShowHarvest
 */
class ShowHarvestResponse extends UseCaseResponse
{
    /**
     * @var Harvest
     */
    private Harvest $harvest;

    /**
     * @return Harvest
     */
    public function getHarvest(): Harvest
    {
        return $this->harvest;
    }

    /**
     * @param Harvest $harvest
     * @return ShowHarvestResponse
     */
    public function setHarvest(Harvest $harvest): ShowHarvestResponse
    {
        $this->harvest = $harvest;
        return $this;
    }

}