<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Query\ShowCommand;

use HelloBees\Sales\Domain\Exception\CommandNotFoundException;
use HelloBees\Sales\Domain\Repository\CommandRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class ShowCommandHandler
{
    public function __construct(
        private CommandRepository $commandRepository,
    ) {
    }

    /**
     * @throws CommandNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(ShowCommandQuery $query): CommandView
    {
        $command = $this->commandRepository->find($query->uuid);

        if ($command === null) {
            throw CommandNotFoundException::withUuid($query->uuid);
        }

        return CommandView::fromEntity($command);
    }
}
