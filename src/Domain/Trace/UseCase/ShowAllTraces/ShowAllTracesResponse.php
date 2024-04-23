<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowAllTraces;

use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;
use HelloBees\Domain\Trace\Collection\TraceCollection;

/**
 * Class
 *
 * @class ShowAllTracesResponse
 * @package HelloBees\Domain\Trace\UseCase\ShowAllTraces
 */
class ShowAllTracesResponse extends UseCaseResponse
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
     * @return ShowAllTracesResponse
     */
    public function setTraceCollection(TraceCollection $traceCollection): ShowAllTracesResponse
    {
        $this->traceCollection = $traceCollection;
        return $this;
    }
}