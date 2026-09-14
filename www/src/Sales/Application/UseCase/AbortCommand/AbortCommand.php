<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\AbortCommand;

use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\Sales\Domain\Repository\CommandRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

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