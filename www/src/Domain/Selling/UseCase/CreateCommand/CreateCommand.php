<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\CreateCommand;

use HelloBees\Domain\Selling\Entity\Command;
use HelloBees\Domain\Selling\Repository\CommandRepository;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 *
 * @class CreateCommand
 * @package HelloBees\Domain\Selling\UseCase\CreateCommand
 */
final readonly class CreateCommand
{
    /**
     * CreateCommand constructor
     *
     * @param CommandRepository $commandRepository
     */
    public function __construct(private CommandRepository $commandRepository)
    {
    }

    /**
     * @param Command $command
     * @param CreateCommandPresenter $presenter
     * @return void
     */
    public function execute(Command $command, CreateCommandPresenter $presenter): void
    {
        $response = new CreateCommandResponse();
        try {
            $this->commandRepository->insert($command);
        } catch (RepositoryException $e) {
            $response->setError(new ResponseError('command.add.failed', ['command' => $command], $e));
        }
        $presenter->present($response);
    }
}