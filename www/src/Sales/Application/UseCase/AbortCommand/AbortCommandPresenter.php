<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\AbortCommand;

interface AbortCommandPresenter
{
    public function present(AbortCommandResponse $response): void;
}