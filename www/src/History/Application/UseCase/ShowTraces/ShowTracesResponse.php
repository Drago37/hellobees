<?php

declare(strict_types=1);

namespace HelloBees\History\Application\UseCase\ShowTraces;

use HelloBees\History\Domain\Collection\TraceCollection;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

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