<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\UseCase\UpdateHarvest;

/**
 * Interface
 *
 * @class UpdateHarvestPresenter
 * @package HelloBees\Domain\Production\UseCase\UpdateHarvest
 */
interface UpdateHarvestPresenter
{
    /**
     * @param UpdateHarvestResponse $response
     * @return void
     */
    public function present(UpdateHarvestResponse $response): void;
}