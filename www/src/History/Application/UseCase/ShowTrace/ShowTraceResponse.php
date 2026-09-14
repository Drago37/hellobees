<?php

declare(strict_types=1);

namespace HelloBees\History\Application\UseCase\ShowTrace;

use HelloBees\History\Domain\Entity\Trace;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

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
     * @param \HelloBees\History\Domain\Entity\Trace $trace
     *
     * @return ShowTraceResponse
     */
    public function setTrace(Trace $trace): ShowTraceResponse
    {
        $this->trace = $trace;
        return $this;
    }
}