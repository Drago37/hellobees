<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\UseCase\ShowHarvestsByApiary;

use HelloBees\Domain\Production\Collection\HarvestCollection;
use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowHarvestsByApiaryResponse
 * @package HelloBees\Domain\Production\UseCase\ShowHarvestsByApiary
 */
class ShowHarvestsByApiaryResponse extends UseCaseResponse
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
     * @return ShowHarvestsByApiaryResponse
     */
    public function setHarvests(HarvestCollection $harvests): ShowHarvestsByApiaryResponse
    {
        $this->harvests = $harvests;
        return $this;
    }

}