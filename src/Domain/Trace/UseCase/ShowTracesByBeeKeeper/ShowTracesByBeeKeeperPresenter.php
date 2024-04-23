<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTracesByBeeKeeper;

/**
 * Interface
 *
 * @class ShowTracesByBeeKeeperPresenter
 * @package HelloBees\Domain\Trace\UseCase\ShowAllTraces
 */
interface ShowTracesByBeeKeeperPresenter
{
    /**
     * @param ShowTracesByBeeKeeperResponse $response
     * @return void
     */
    public function present(ShowTracesByBeeKeeperResponse $response): void;
}