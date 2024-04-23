<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\UseCase\ShowHarvest;

/**
 * Interface
 *
 * @class ShowHarvestPresenter
 * @package HelloBees\Domain\Production\UseCase\ShowHarvest
 */
interface ShowHarvestPresenter
{
    /**
     * @param ShowHarvestResponse $response
     * @return void
     */
    public function present(ShowHarvestResponse $response): void;
}