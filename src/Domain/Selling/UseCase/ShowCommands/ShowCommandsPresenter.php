<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowCommands;

/**
 * Interface
 *
 * @class ShowCommandsPresenter
 * @package HelloBees\Domain\Selling\UseCase\ShowCommands
 */
interface ShowCommandsPresenter
{
    /**
     * @param ShowCommandsResponse $response
     * @return void
     */
    public function present(ShowCommandsResponse $response): void;
}