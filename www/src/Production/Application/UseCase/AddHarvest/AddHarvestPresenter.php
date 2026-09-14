<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\AddHarvest;

interface AddHarvestPresenter
{
    public function present(AddHarvestResponse $response): void;
}