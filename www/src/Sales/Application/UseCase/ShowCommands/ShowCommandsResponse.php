<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCommands;

use HelloBees\Sales\Domain\Collection\CommandCollection;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

class ShowCommandsResponse extends UseCaseResponse
{
    private CommandCollection $commands;

    public function getCommands(): CommandCollection
    {
        return $this->commands;
    }

    public function setCommands(CommandCollection $commands): ShowCommandsResponse
    {
        $this->commands = $commands;
        return $this;
    }
}