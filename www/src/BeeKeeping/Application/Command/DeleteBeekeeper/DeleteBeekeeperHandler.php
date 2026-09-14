<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\Command\DeleteBeekeeper;

use HelloBees\BeeKeeping\Domain\Exception\BeekeeperNotFoundException;
use HelloBees\BeeKeeping\Domain\Repository\BeekeeperRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class DeleteBeekeeperHandler
{
    public function __construct(
        private BeekeeperRepository $beekeeperRepository,
    ) {
    }

    /**
     * @throws BeekeeperNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(DeleteBeekeeperCommand $command): void
    {
        $beeKeeper = $this->beekeeperRepository->find($command->uuid);

        if ($beeKeeper === null) {
            throw BeekeeperNotFoundException::withUuid($command->uuid);
        }

        $this->beekeeperRepository->delete($beeKeeper);
    }
}
