<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\UseCase\AddBeekeeper;

use HelloBees\BeeKeeping\Domain\Repository\BeekeeperRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

class AddBeekeeper
{
    public function __construct(
        private BeekeeperRepository $beekeeperRepository
    )
    {
    }

    public function execute(
        AddBeekeeperRequest   $addBeekeeperRequest,
        AddBeeKeeperPresenter $addBeeKeeperPresenter
    ): void
    {
        $addBeekeeperResponse = new AddBeekeeperResponse();
        try {
            $this->beekeeperRepository->insert($addBeekeeperRequest->getBeeKeeper());
            $addBeekeeperResponse->setBeeKeeper($addBeekeeperRequest->getBeeKeeper());
        } catch (RepositoryException $e) {
            $addBeekeeperResponse->setError(new ResponseError('beekeeper.add.error', [], $e));
        }
        $addBeeKeeperPresenter->present($addBeekeeperResponse);
    }
}