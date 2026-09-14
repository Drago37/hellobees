<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\Command\UpdateBeekeeper;

use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\BeeKeeping\Domain\Exception\BeekeeperNotFoundException;
use HelloBees\BeeKeeping\Domain\Repository\BeekeeperRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class UpdateBeekeeperHandler
{
    public function __construct(
        private BeekeeperRepository $beekeeperRepository,
    ) {
    }

    /**
     * @throws BeekeeperNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(UpdateBeekeeperCommand $command): BeeKeeper
    {
        $beeKeeper = $this->beekeeperRepository->find($command->uuid);

        if ($beeKeeper === null) {
            throw BeekeeperNotFoundException::withUuid($command->uuid);
        }

        $beeKeeper
            ->setNumeroNapi($command->napiNumber)
            ->setUsername($command->username)
            ->setEmail($command->email)
            ->setType($command->type);

        $this->beekeeperRepository->update($beeKeeper);

        return $beeKeeper;
    }
}
