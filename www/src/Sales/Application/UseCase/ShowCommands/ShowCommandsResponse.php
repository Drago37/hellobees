<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCommands;

use HelloBees\Sales\Domain\Collection\CommandCollection;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowCommandsResponse
 * @package HelloBees\Domain\Selling\UseCase\ShowCommands
 */
class ShowCommandsResponse extends UseCaseResponse
{
    /**
     * @var CommandCollection
     */
    private CommandCollection $commands;

    /**
     * @return CommandCollection
     */
    public function getCommands(): CommandCollection
    {
        return $this->commands;
    }

    /**
     * @param CommandCollection $commands
     * @return ShowCommandsResponse
     */
    public function setCommands(CommandCollection $commands): ShowCommandsResponse
    {
        $this->commands = $commands;
        return $this;
    }
}