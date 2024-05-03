<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\CreateCommand;

/**
 * Interface
 *
 * @class CreateCommandPresenter
 * @package HelloBees\Domain\Selling\UseCase\CreateCommand
 */
interface CreateCommandPresenter
{
    /**
     * @param CreateCommandResponse $response
     * @return void
     */
    public function present(CreateCommandResponse $response): void;
}