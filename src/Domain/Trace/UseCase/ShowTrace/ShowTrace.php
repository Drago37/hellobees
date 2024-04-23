<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTrace;

use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;
use HelloBees\Domain\Trace\Repository\TraceRepository;

/**
 * Class
 *
 * @class ShowTrace
 * @package HelloBees\Domain\Trace\UseCase\ShowTrace
 */
final readonly class ShowTrace
{
    /**
     * ShowTrace constructor
     *
     * @param TraceRepository $traceRepository
     */
    public function __construct(private TraceRepository $traceRepository)
    {
    }

    /**
     * @param Uuid $traceUuid
     * @param ShowTracePresenter $presenter
     * @return void
     */
    public function execute(Uuid $traceUuid, ShowTracePresenter $presenter): void
    {
        $response = new ShowTraceResponse();
        try {
            $trace = $this->traceRepository->find($traceUuid);
            if (is_null($trace)) {
                $response->setError(new ResponseError("trace.not.found", ['uuid' => $traceUuid]));
            } else {
                $response->setTrace($trace);
            }
        } catch (RepositoryException $e) {
            $response->setError(new ResponseError("trace.find.failed", ['uuid' => $traceUuid], $e));
        }
        $presenter->present($response);
    }
}