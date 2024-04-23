<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTrace;

/**
 * Interface
 *
 * @class ShowTracePresenter
 * @package HelloBees\Domain\Trace\UseCase\ShowTrace
 */
interface ShowTracePresenter
{
    /**
     * @param ShowTraceResponse $response
     * @return void
     */
    public function present(ShowTraceResponse $response): void;
}