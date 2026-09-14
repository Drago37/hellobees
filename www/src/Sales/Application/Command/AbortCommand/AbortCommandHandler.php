<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Command\AbortCommand;

use HelloBees\Sales\Domain\Exception\CommandNotFoundException;
use HelloBees\Sales\Domain\Repository\CommandRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class AbortCommandHandler
{
    public function __construct(
        private CommandRepository $commandRepository,
    ) {
    }

    /**
     * @throws CommandNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(AbortCommandCommand $command): void
    {
        $salesCommand = $this->commandRepository->find($command->uuid);

        if ($salesCommand === null) {
            throw CommandNotFoundException::withUuid($command->uuid);
        }

        $this->commandRepository->delete($salesCommand);
    }
}
