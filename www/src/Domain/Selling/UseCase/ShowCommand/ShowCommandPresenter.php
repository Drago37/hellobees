<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowCommand;

/**
 * Interface
 *
 * @class ShowCommandPresenter
 * @package HelloBees\Domain\Selling\UseCase\ShowCommand
 */
interface ShowCommandPresenter
{
    /**
     * @param ShowCommandResponse $response
     * @return void
     */
    public function present(ShowCommandResponse $response): void;
}