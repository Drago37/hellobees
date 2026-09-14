<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\ShowHarvest;

use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

class ShowHarvestResponse extends UseCaseResponse
{
    private Harvest $harvest;

    public function getHarvest(): Harvest
    {
        return $this->harvest;
    }

    public function setHarvest(Harvest $harvest): ShowHarvestResponse
    {
        $this->harvest = $harvest;
        return $this;
    }

}