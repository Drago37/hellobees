<?php

declare(strict_types=1);

namespace HelloBees\History\Application\UseCase\ShowTraces;

interface ShowTracesPresenter
{
    public function present(ShowTracesResponse $response): void;
}