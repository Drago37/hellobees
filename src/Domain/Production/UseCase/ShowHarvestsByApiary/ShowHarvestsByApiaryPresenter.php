<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\UseCase\ShowHarvestsByApiary;

/**
 * Interface
 *
 * @class ShowHarvestsByApiaryPresenter
 * @package HelloBees\Domain\Production\UseCase\ShowHarvestsByApiary
 */
interface ShowHarvestsByApiaryPresenter
{
    /**
     * @param ShowHarvestsByApiaryResponse $response
     * @return void
     */
    public function present(ShowHarvestsByApiaryResponse $response): void;
}