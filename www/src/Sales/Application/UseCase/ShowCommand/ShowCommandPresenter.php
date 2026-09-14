<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCommand;

interface ShowCommandPresenter
{
    public function present(ShowCommandResponse $response): void;
}