<?php

declare(strict_types=1);

namespace HelloBees\History\Application\UseCase\ShowTrace;

use HelloBees\History\Domain\Repository\TraceRepository;
use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class ShowTrace
{
    public function __construct(private TraceRepository $traceRepository)
    {
    }

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

    private function validateRequest(ShowTraceRequest $request): bool
    {
        return !empty($request->getTraceId());
    }
}