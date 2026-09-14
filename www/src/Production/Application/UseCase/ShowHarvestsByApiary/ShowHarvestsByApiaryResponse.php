<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\ShowHarvestsByApiary;

use HelloBees\Production\Domain\Collection\HarvestCollection;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

class ShowHarvestsByApiaryResponse extends UseCaseResponse
{
    private HarvestCollection $harvests;

    public function getHarvests(): HarvestCollection
    {
        return $this->harvests;
    }

    public function setHarvests(HarvestCollection $harvests): ShowHarvestsByApiaryResponse
    {
        $this->harvests = $harvests;
        return $this;
    }

}