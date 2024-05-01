<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTraces;

use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;
use HelloBees\Domain\Trace\Collection\TraceCollection;

/**
 * Class
 *
 * @class ShowTracesResponse
 * @package HelloBees\Domain\Trace\UseCase\ShowTraces
 */
class ShowTracesResponse extends UseCaseResponse
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
     * @return ShowTracesResponse
     */
    public function setTraceCollection(TraceCollection $traceCollection): ShowTracesResponse
    {
        $this->traceCollection = $traceCollection;
        return $this;
    }
}