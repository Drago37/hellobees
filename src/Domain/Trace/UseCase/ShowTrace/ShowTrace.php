<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTrace;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
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
     * @param ShowTraceRequest $request
     * @param ShowTracePresenter $presenter
     * @return void
     */
    public function execute(ShowTraceRequest $request, ShowTracePresenter $presenter): void
    {
        $response = new ShowTraceResponse();
        if($this->validateRequest($request)) {
            try {
                $trace = $this->traceRepository->find(new Uuid($request->getTraceId()));
                if (is_null($trace)) {
                    $response->setError(new ResponseError("trace.not.found", ['uuid' => $request->getTraceId()]));
                } else {
                    $response->setTrace($trace);
                }
            } catch (RepositoryException|InvalidValueObjectException $e) {
                $response->setError(new ResponseError("trace.find.failed", ['uuid' => $request->getTraceId()], $e));
            }
        } else {
            $response->setError(new ResponseError("trace.request.invalid", ['uuid' => $request->getTraceId()]));
        }
        $presenter->present($response);
    }

    /**
     * @param ShowTraceRequest $request
     * @return bool
     */
    private function validateRequest(ShowTraceRequest $request): bool
    {
        return !empty($request->getTraceId());
    }
}