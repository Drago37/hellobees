<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowCommandsByCustomer;

use HelloBees\Domain\Selling\Collection\CommandCollection;
use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowCommandsByCustomerResponse
 * @package HelloBees\Domain\Selling\UseCase\ShowCommandsByCustomer
 */
class ShowCommandsByCustomerResponse extends UseCaseResponse
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
     * @return ShowCommandsByCustomerResponse
     */
    public function setCommands(CommandCollection $commands): ShowCommandsByCustomerResponse
    {
        $this->commands = $commands;
        return $this;
    }

}