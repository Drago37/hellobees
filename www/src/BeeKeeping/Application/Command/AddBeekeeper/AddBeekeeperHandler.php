<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\Command\AddBeekeeper;

use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\BeeKeeping\Domain\Repository\BeekeeperRepository;
use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class AddBeekeeperHandler
{
    public function __construct(
        private BeekeeperRepository $beekeeperRepository,
    ) {
    }

    /**
     * @throws InvalidValueObjectException
     * @throws RepositoryException
     */
    public function __invoke(AddBeekeeperCommand $command): BeeKeeper
    {
        $beeKeeper = new BeeKeeper(
            Uuid::generate(),
            $command->napiNumber,
            $command->username,
            $command->email,
            $command->type,
            DateTime::now(),
        );

        $this->beekeeperRepository->insert($beeKeeper);

        return $beeKeeper;
    }
}
