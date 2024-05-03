<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\AbortCommand;

use HelloBees\Domain\Selling\Entity\Command;
use HelloBees\Domain\Selling\Repository\CommandRepository;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 *
 * @class AbortCommand
 * @package HelloBees\Domain\Selling\UseCase\AbortCommand
 */
final readonly class AbortCommand
{
    /**
     * AbortCommand constructor
     *
     * @param CommandRepository $commandRepository
     */
    public function __construct(private CommandRepository $commandRepository)
    {
    }

    /**
     * @param Command $command
     * @param AbortCommandPresenter $presenter
     * @return void
     */
    public function execute(Command $command, AbortCommandPresenter $presenter): void
    {
        $response = new AbortCommandResponse();
        try {
            $this->commandRepository->delete($command);
        } catch (RepositoryException $e) {
            $response->setError(new ResponseError('command.delete.failed', ['command' => $command], $e));
        }
        $presenter->present($response);
    }
}