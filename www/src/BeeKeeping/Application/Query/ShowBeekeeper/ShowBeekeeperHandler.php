<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\Query\ShowBeekeeper;

use HelloBees\BeeKeeping\Domain\Exception\BeekeeperNotFoundException;
use HelloBees\BeeKeeping\Domain\Repository\BeekeeperRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class ShowBeekeeperHandler
{
    public function __construct(
        private BeekeeperRepository $beekeeperRepository,
    ) {
    }

    /**
     * @throws BeekeeperNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(ShowBeekeeperQuery $query): BeekeeperView
    {
        $beeKeeper = $this->beekeeperRepository->find($query->uuid);

        if ($beeKeeper === null) {
            throw BeekeeperNotFoundException::withUuid($query->uuid);
        }

        return BeekeeperView::fromEntity($beeKeeper);
    }
}
