<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTracesByBeehive;

/**
 * Interface
 *
 * @class ShowTracesByBeehivePresenter
 * @package HelloBees\Domain\Trace\UseCase\ShowAllTraces
 */
interface ShowTracesByBeehivePresenter
{
    /**
     * @param ShowTracesByBeehiveResponse $response
     * @return void
     */
    public function present(ShowTracesByBeehiveResponse $response): void;
}