<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\Query\ListBeekeepers;

use HelloBees\BeeKeeping\Application\Query\ShowBeekeeper\BeekeeperView;
use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\BeeKeeping\Domain\Repository\BeekeeperRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class ListBeekeepersHandler
{
    public function __construct(
        private BeekeeperRepository $beekeeperRepository,
    ) {
    }

    /**
     * @return list<BeekeeperView>
     *
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function __invoke(ListBeekeepersQuery $query): array
    {
        return array_map(
            static fn (BeeKeeper $beeKeeper): BeekeeperView => BeekeeperView::fromEntity($beeKeeper),
            $this->beekeeperRepository->findAll()->values(),
        );
    }
}
