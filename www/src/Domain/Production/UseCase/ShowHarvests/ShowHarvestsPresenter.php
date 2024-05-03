<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\UseCase\ShowHarvests;

/**
 * Interface
 *
 * @class ShowHarvestsPresenter
 * @package HelloBees\Domain\Production\UseCase\ShowHarvests
 */
interface ShowHarvestsPresenter
{
    /**
     * @param ShowHarvestsResponse $response
     * @return void
     */
    public function present(ShowHarvestsResponse $response): void;
}