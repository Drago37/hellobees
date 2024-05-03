<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowCommands;

use HelloBees\Domain\Selling\Repository\CommandRepository;
use HelloBees\Domain\Selling\UseCase\ShowCommand\ShowCommandResponse;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 *
 * @class ShowCommands
 * @package HelloBees\Domain\Selling\UseCase\ShowCommands
 */
final readonly class ShowCommands
{
    /**
     * ShowCommands constructor
     *
     * @param CommandRepository $commandRepository
     */
    public function __construct(private CommandRepository $commandRepository)
    {
    }

    /**
     * @param ShowCommandsPresenter $presenter
     * @return void
     */
    public function execute(ShowCommandsPresenter $presenter): void
    {
        $response = new ShowCommandsResponse();
        try {
            $commands = $this->commandRepository->findAll();
            $response->setCommands($commands);
        } catch (CollectionException|RepositoryException $e) {
            $response->setError(new ResponseError("command.find_all.failed", [], $e));
        }
        $presenter->present($response);
    }
}