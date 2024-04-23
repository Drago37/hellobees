<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\UseCase\AddBeekeeper;

use HelloBees\Domain\BeeKeeping\Repository\BeekeeperRepository;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 * @class AddBeekeeper
 * @package HelloBees\Domain\BeeKeeping\UseCase
 */
class AddBeekeeper
{
    /**
     * AddBeekeeper constructor
     *
     * @param BeekeeperRepository $beekeeperRepository
     */
    public function __construct(
        private BeekeeperRepository $beekeeperRepository
    )
    {
    }

    /**
     * @param AddBeekeeperRequest $addBeekeeperRequest
     * @param AddBeeKeeperPresenter $addBeeKeeperPresenter
     * @return void
     */
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