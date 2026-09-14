<?php

declare(strict_types=1);

namespace HelloBees\History\Application\UseCase\ShowTrace;

interface ShowTracePresenter
{
    public function present(ShowTraceResponse $response): void;
}