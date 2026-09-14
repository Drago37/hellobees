<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCommandsByCustomer;

use HelloBees\Sales\Domain\Collection\CommandCollection;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

class ShowCommandsByCustomerResponse extends UseCaseResponse
{
    private CommandCollection $commands;

    public function getCommands(): CommandCollection
    {
        return $this->commands;
    }

    public function setCommands(CommandCollection $commands): ShowCommandsByCustomerResponse
    {
        $this->commands = $commands;
        return $this;
    }

}