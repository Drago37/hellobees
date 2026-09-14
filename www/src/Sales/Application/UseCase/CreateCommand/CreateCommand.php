<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\CreateCommand;

use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\Sales\Domain\Repository\CommandRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

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
     * @param \HelloBees\Sales\Domain\Repository\CommandRepository $commandRepository
     */
    public function __construct(private CommandRepository $commandRepository)
    {
    }

    /**
     * @param \HelloBees\Sales\Domain\Entity\Command $command
     * @param CreateCommandPresenter $presenter
     *
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