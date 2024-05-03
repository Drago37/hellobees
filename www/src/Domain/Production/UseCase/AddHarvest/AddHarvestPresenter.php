<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\UseCase\AddHarvest;

/**
 * Interface
 *
 * @class AddHarvestPresenter
 * @package HelloBees\Domain\Production\UseCase\AddHarvest
 */
interface AddHarvestPresenter
{
    /**
     * @param AddHarvestResponse $response
     * @return void
     */
    public function present(AddHarvestResponse $response): void;
}