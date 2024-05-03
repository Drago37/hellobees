<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\UseCase\AddBeekeeper;

/**
 * Interface
 *
 * @class AddKeeperPresenter
 * @package HelloBees\Domain\BeeKeeping\UseCase
 */
interface AddBeeKeeperPresenter
{
    /**
     * @param AddBeekeeperResponse $addBeekeeperResponse
     */
    public function present(AddBeekeeperResponse $addBeekeeperResponse): void;
}