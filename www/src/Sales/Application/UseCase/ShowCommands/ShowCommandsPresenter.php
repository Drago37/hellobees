<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCommands;

interface ShowCommandsPresenter
{
    public function present(ShowCommandsResponse $response): void;
}