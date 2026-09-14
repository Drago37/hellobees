<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCommands;

use HelloBees\Sales\Domain\Repository\CommandRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

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
     * @param \HelloBees\Sales\Domain\Repository\CommandRepository $commandRepository
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