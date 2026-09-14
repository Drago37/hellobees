<?php

declare(strict_types=1);

namespace HelloBees\History\Application\UseCase\ShowTrace;

use HelloBees\History\Domain\Entity\Trace;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

class ShowTraceResponse extends UseCaseResponse
{
    private Trace $trace;

    public function getTrace(): Trace
    {
        return $this->trace;
    }

    public function setTrace(Trace $trace): ShowTraceResponse
    {
        $this->trace = $trace;
        return $this;
    }
}