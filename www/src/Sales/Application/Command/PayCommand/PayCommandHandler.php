<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Command\PayCommand;

use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\Sales\Domain\Exception\CommandNotFoundException;
use HelloBees\Sales\Domain\Repository\CommandRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class PayCommandHandler
{
    public function __construct(
        private CommandRepository $commandRepository,
    ) {
    }

    /**
     * @throws CommandNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(PayCommandCommand $command): Command
    {
        $salesCommand = $this->commandRepository->find($command->uuid);

        if ($salesCommand === null) {
            throw CommandNotFoundException::withUuid($command->uuid);
        }

        $salesCommand->setPayed(true);

        $this->commandRepository->update($salesCommand);

        return $salesCommand;
    }
}
