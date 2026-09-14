<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCommand;

use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowCommandResponse
 * @package HelloBees\Domain\Selling\UseCase\ShowCommand
 */
class ShowCommandResponse extends UseCaseResponse
{
    /**
     * @var \HelloBees\Sales\Domain\Entity\Command
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
     * @param \HelloBees\Sales\Domain\Entity\Command $command
     *
     * @return ShowCommandResponse
     */
    public function setCommand(Command $command): ShowCommandResponse
    {
        $this->command = $command;
        return $this;
    }

}