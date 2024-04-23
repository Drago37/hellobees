<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTracesByApiary;

use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;
use HelloBees\Domain\Trace\Collection\TraceCollection;

/**
 * Class
 *
 * @class ShowAllTracesResponse
 * @package HelloBees\Domain\Trace\UseCase\ShowTracesByApiary
 */
class ShowTracesByApiaryResponse extends UseCaseResponse
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
     * @return $this
     */
    public function setTraceCollection(TraceCollection $traceCollection): ShowTracesByApiaryResponse
    {
        $this->traceCollection = $traceCollection;
        return $this;
    }
}