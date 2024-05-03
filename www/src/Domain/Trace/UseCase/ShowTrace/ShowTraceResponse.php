<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTrace;

use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;
use HelloBees\Domain\Trace\Entity\Trace;

/**
 * Class
 *
 * @class ShowTraceResponse
 * @package HelloBees\Domain\Trace\UseCase\ShowTrace
 */
class ShowTraceResponse extends UseCaseResponse
{
    /**
     * @var Trace
     */
    private Trace $trace;

    /**
     * @return Trace
     */
    public function getTrace(): Trace
    {
        return $this->trace;
    }

    /**
     * @param Trace $trace
     * @return ShowTraceResponse
     */
    public function setTrace(Trace $trace): ShowTraceResponse
    {
        $this->trace = $trace;
        return $this;
    }
}