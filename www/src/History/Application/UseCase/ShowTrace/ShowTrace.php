<?php

declare(strict_types=1);

namespace HelloBees\History\Application\UseCase\ShowTrace;

use HelloBees\History\Domain\Repository\TraceRepository;
use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

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
     * @param \HelloBees\History\Domain\Repository\TraceRepository $traceRepository
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