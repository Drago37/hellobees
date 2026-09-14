<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Application\UseCase\AddBeekeeper;

interface AddBeeKeeperPresenter
{
    public function present(AddBeekeeperResponse $addBeekeeperResponse): void;
}