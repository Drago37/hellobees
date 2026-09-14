<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\ShowHarvests;

interface ShowHarvestsPresenter
{
    public function present(ShowHarvestsResponse $response): void;
}