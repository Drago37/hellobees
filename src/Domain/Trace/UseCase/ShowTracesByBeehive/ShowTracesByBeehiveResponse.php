<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTracesByBeehive;

use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;
use HelloBees\Domain\Trace\Collection\TraceCollection;

/**
 * Class
 *
 * @class ShowTracesByBeehiveResponse
 * @package HelloBees\Domain\Trace\UseCase\ShowTracesByBeehive
 */
class ShowTracesByBeehiveResponse extends UseCaseResponse
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
     * @return ShowTracesByBeehiveResponse
     */
    public function setTraceCollection(TraceCollection $traceCollection): ShowTracesByBeehiveResponse
    {
        $this->traceCollection = $traceCollection;
        return $this;
    }
}