<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\ShowHarvests;

use HelloBees\Production\Domain\Collection\HarvestCollection;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowHarvestsResponse
 * @package HelloBees\Domain\Production\UseCase\ShowHarvests
 */
class ShowHarvestsResponse extends UseCaseResponse
{
    /**
     * @var \HelloBees\BeeKeeping\Domain\Production\Collection\\HelloBees\Production\Domain\Collection\HarvestCollection
     */
    private HarvestCollection $harvests;

    /**
     * @return \HelloBees\BeeKeeping\Domain\Production\Collection\\HelloBees\Production\Domain\Collection\HarvestCollection
     */
    public function getHarvests(): HarvestCollection
    {
        return $this->harvests;
    }

    /**
     * @param \HelloBees\Production\Domain\Collection\HarvestCollection $harvests
     *
     * @return ShowHarvestsResponse
     */
    public function setHarvests(HarvestCollection $harvests): ShowHarvestsResponse
    {
        $this->harvests = $harvests;
        return $this;
    }

}