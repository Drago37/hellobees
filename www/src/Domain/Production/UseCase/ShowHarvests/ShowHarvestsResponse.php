<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\UseCase\ShowHarvests;

use HelloBees\Domain\Production\Collection\HarvestCollection;
use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowHarvestsResponse
 * @package HelloBees\Domain\Production\UseCase\ShowHarvests
 */
class ShowHarvestsResponse extends UseCaseResponse
{
    /**
     * @var HarvestCollection
     */
    private HarvestCollection $harvests;

    /**
     * @return HarvestCollection
     */
    public function getHarvests(): HarvestCollection
    {
        return $this->harvests;
    }

    /**
     * @param HarvestCollection $harvests
     * @return ShowHarvestsResponse
     */
    public function setHarvests(HarvestCollection $harvests): ShowHarvestsResponse
    {
        $this->harvests = $harvests;
        return $this;
    }

}