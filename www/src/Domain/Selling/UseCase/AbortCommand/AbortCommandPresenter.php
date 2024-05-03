<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\AbortCommand;

/**
 * Interface
 *
 * @class AbortCommandPresenter
 * @package HelloBees\Domain\Selling\UseCase\AbortCommand
 */
interface AbortCommandPresenter
{
    /**
     * @param AbortCommandResponse $response
     * @return void
     */
    public function present(AbortCommandResponse $response): void;
}