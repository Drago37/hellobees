<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\UseCase\AddBeekeeper;

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