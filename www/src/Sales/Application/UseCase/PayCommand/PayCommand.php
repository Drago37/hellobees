<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\PayCommand;

use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\Sales\Domain\Repository\CommandRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

final readonly class PayCommand
{
    public function __construct(private CommandRepository $commandRepository)
    {
    }

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