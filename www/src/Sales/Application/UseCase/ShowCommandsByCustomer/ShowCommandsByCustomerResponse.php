<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCommandsByCustomer;

use HelloBees\Sales\Domain\Collection\CommandCollection;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowCommandsByCustomerResponse
 * @package HelloBees\Domain\Selling\UseCase\ShowCommandsByCustomer
 */
class ShowCommandsByCustomerResponse extends UseCaseResponse
{
    /**
     * @var \HelloBees\Sales\Domain\Collection\CommandCollection
     */
    private CommandCollection $commands;

    /**
     * @return \HelloBees\Sales\Domain\Collection\CommandCollection
     */
    public function getCommands(): CommandCollection
    {
        return $this->commands;
    }

    /**
     * @param \HelloBees\Sales\Domain\Collection\CommandCollection $commands
     *
     * @return ShowCommandsByCustomerResponse
     */
    public function setCommands(CommandCollection $commands): ShowCommandsByCustomerResponse
    {
        $this->commands = $commands;
        return $this;
    }

}