<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowCommand;

use HelloBees\Domain\Selling\Entity\Command;
use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowCommandResponse
 * @package HelloBees\Domain\Selling\UseCase\ShowCommand
 */
class ShowCommandResponse extends UseCaseResponse
{
    /**
     * @var Command
     */
    private Command $command;

    /**
     * @return Command
     */
    public function getCommand(): Command
    {
        return $this->command;
    }

    /**
     * @param Command $command
     * @return ShowCommandResponse
     */
    public function setCommand(Command $command): ShowCommandResponse
    {
        $this->command = $command;
        return $this;
    }

}