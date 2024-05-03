<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\PayCommand;

use HelloBees\Domain\Selling\Entity\Command;
use HelloBees\Domain\Selling\Repository\CommandRepository;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 *
 * @class PayCommand
 * @package HelloBees\Domain\Selling\UseCase\PayCommand
 */
final readonly class PayCommand
{
    /**
     * PayCommand constructor
     *
     * @param CommandRepository $commandRepository
     */
    public function __construct(private CommandRepository $commandRepository)
    {
    }

    /**
     * @param Command $command
     * @param PayCommandPresenter $presenter
     * @return void
     */
    public function execute(Command $command, PayCommandPresenter $presenter):void {
        $response = new PayCommandResponse();
        try {
            $this->commandRepository->update($command);
        } catch (RepositoryException $e) {
            $response->setError(new ResponseError('command.pay.failed', ['command' => $command], $e));
        }
        $presenter->present($response);
    }
}