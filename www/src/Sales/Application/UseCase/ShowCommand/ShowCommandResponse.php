<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCommand;

use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

class ShowCommandResponse extends UseCaseResponse
{
    private Command $command;

    public function getCommand(): Command
    {
        return $this->command;
    }

    public function setCommand(Command $command): ShowCommandResponse
    {
        $this->command = $command;
        return $this;
    }

}