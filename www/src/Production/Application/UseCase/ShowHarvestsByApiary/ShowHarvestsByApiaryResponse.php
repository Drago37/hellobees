<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\ShowHarvestsByApiary;

use HelloBees\Production\Domain\Collection\HarvestCollection;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowHarvestsByApiaryResponse
 * @package HelloBees\Domain\Production\UseCase\ShowHarvestsByApiary
 */
class ShowHarvestsByApiaryResponse extends UseCaseResponse
{
    /**
     * @var \HelloBees\Production\Domain\Collection\HarvestCollection
     */
    private HarvestCollection $harvests;

    /**
     * @return \HelloBees\Production\Domain\Collection\HarvestCollection
     */
    public function getHarvests(): HarvestCollection
    {
        return $this->harvests;
    }

    /**
     * @param \HelloBees\Production\Domain\Collection\HarvestCollection $harvests
     *
     * @return ShowHarvestsByApiaryResponse
     */
    public function setHarvests(HarvestCollection $harvests): ShowHarvestsByApiaryResponse
    {
        $this->harvests = $harvests;
        return $this;
    }

}