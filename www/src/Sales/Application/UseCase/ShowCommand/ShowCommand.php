<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCommand;

use HelloBees\Sales\Domain\Repository\CommandRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

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
     * @param \HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid $commandUuid
     * @param ShowCommandPresenter $presenter
     *
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