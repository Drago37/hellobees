<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\ShowHarvest;

interface ShowHarvestPresenter
{
    public function present(ShowHarvestResponse $response): void;
}