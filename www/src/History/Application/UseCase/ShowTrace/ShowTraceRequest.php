<?php

declare(strict_types=1);

namespace HelloBees\History\Application\UseCase\ShowTrace;


class ShowTraceRequest
{
    public function __construct(
        private string $traceId
    )
    {
    }

    public function getTraceId(): string
    {
        return $this->traceId;
    }

    public function setTraceId(string $traceId): ShowTraceRequest
    {
        $this->traceId = $traceId;
        return $this;
    }
}