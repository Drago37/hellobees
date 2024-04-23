<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTracesByBeeKeeper;

use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;
use HelloBees\Domain\Trace\Collection\TraceCollection;

/**
 * Class
 *
 * @class ShowTracesByBeeKeeperResponse
 * @package HelloBees\Domain\Trace\UseCase\ShowTracesByBeeKeeper
 */
class ShowTracesByBeeKeeperResponse extends UseCaseResponse
{
    /** @var TraceCollection */
    private TraceCollection $traceCollection;

    /**
     * @return TraceCollection
     */
    public function getTraceCollection(): TraceCollection
    {
        return $this->traceCollection;
    }

    /**
     * @param TraceCollection $traceCollection
     * @return ShowTracesByBeeKeeperResponse
     */
    public function setTraceCollection(TraceCollection $traceCollection): ShowTracesByBeeKeeperResponse
    {
        $this->traceCollection = $traceCollection;
        return $this;
    }
}