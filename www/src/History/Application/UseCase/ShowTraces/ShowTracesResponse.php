<?php

declare(strict_types=1);

namespace HelloBees\History\Application\UseCase\ShowTraces;

use HelloBees\History\Domain\Collection\TraceCollection;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

class ShowTracesResponse extends UseCaseResponse
{
    private TraceCollection $traceCollection;

    public function getTraceCollection(): TraceCollection
    {
        return $this->traceCollection;
    }

    public function setTraceCollection(TraceCollection $traceCollection): ShowTracesResponse
    {
        $this->traceCollection = $traceCollection;
        return $this;
    }
}