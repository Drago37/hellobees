<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\UpdateHarvest;

interface UpdateHarvestPresenter
{
    public function present(UpdateHarvestResponse $response): void;
}