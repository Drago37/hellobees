<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTrace;


/**
 * Class
 *
 * @class ShowTraceRequest
 * @package HelloBees\Domain\Trace\UseCase\ShowTrace
 */
class ShowTraceRequest
{
    /**
     * ShowTraceRequest constructor
     *
     * @param string $traceId
     */
    public function __construct(
        private string $traceId
    )
    {
    }

    /**
     * @return string
     */
    public function getTraceId(): string
    {
        return $this->traceId;
    }

    /**
     * @param string $traceId
     * @return $this
     */
    public function setTraceId(string $traceId): ShowTraceRequest
    {
        $this->traceId = $traceId;
        return $this;
    }
}