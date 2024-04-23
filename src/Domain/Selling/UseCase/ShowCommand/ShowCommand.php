<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowCommand;

use HelloBees\Domain\Selling\Repository\CommandRepository;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Class
 *
 * @class ShowCommand
 * @package HelloBees\Domain\Selling\UseCase\ShowCommand
 */
final readonly class ShowCommand
{
    /**
     * ShowCommand constructor
     *
     * @param CommandRepository $commandRepository
     */
    public function __construct(private CommandRepository $commandRepository)
    {
    }

    /**
     * @param Uuid $commandUuid
     * @param ShowCommandPresenter $presenter
     * @return void
     */
    public function execute(Uuid $commandUuid, ShowCommandPresenter $presenter): void
    {
        $response = new ShowCommandResponse();
        try {
            $command = $this->commandRepository->find($commandUuid);
            if (!is_null($command)) {
                $response->setCommand($command);
            } else {
                $response->setError(new ResponseError("command.not.found", ['uuid' => $commandUuid]));
            }
        } catch (RepositoryException $e) {
            $response->setError(new ResponseError("command.find.failed", ['uuid' => $commandUuid], $e));
        }
        $presenter->present($response);
    }
}