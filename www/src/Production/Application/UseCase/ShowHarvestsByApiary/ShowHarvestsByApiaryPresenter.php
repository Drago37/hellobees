<?php

declare(strict_types=1);

namespace HelloBees\Production\Application\UseCase\ShowHarvestsByApiary;

interface ShowHarvestsByApiaryPresenter
{
    public function present(ShowHarvestsByApiaryResponse $response): void;
}