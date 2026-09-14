<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Query\ListCommands;

use HelloBees\Sales\Application\Query\ShowCommand\CommandView;
use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\Sales\Domain\Repository\CommandRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class ListCommandsHandler
{
    public function __construct(
        private CommandRepository $commandRepository,
    ) {
    }

    /**
     * @return list<CommandView>
     *
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function __invoke(ListCommandsQuery $query): array
    {
        return array_map(
            static fn (Command $command): CommandView => CommandView::fromEntity($command),
            $this->commandRepository->findAll()->values(),
        );
    }
}
