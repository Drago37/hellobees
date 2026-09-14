<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\CreateCommand;

interface CreateCommandPresenter
{
    public function present(CreateCommandResponse $response): void;
}