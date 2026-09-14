<?php

declare(strict_types=1);

namespace HelloBees\History\Application\UseCase\ShowTraces;

use HelloBees\History\Domain\Entity\Trace;
use HelloBees\History\Domain\Repository\TraceRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

/**
 * Class
 *
 * @class ShowTraces
 * @package HelloBees\Domain\Trace\UseCase\ShowTraces
 */
final readonly class ShowTraces
{
    /**
     * ShowTraces constructor
     *
     * @param \HelloBees\History\Domain\Repository\TraceRepository $traceRepository
     */
    public function __construct(private TraceRepository $traceRepository)
    {
    }

    /**
     * @param ShowTracesRequest $request
     * @param ShowTracesPresenter $presenter
     * @return void
     */
    public function execute(ShowTracesRequest $request, ShowTracesPresenter $presenter): void
    {
        $response = new ShowTracesResponse();
        try {
            $traceCollection = $this->traceRepository->findAll();
            if ($this->hasFilters($request)) {
                if (!empty($request->getByBeeKeeperId())) {
                    $traceCollection->filter(function ($trace) use ($request) {
                        /** @var \HelloBees\History\Domain\Entity\Trace $trace */
                        return $trace->getBeeKeeperId() === $request->getByBeeKeeperId();
                    });
                }
                if (!empty($request->getByBeehiveId())) {
                    $traceCollection->filter(function ($trace) use ($request) {
                        /** @var Trace $trace */
                        return $trace->getBeehiveId() === $request->getByBeehiveId();
                    });
                }
                if (!empty($request->getByApiaryId())) {
                    $traceCollection->filter(function ($trace) use ($request) {
                        /** @var \HelloBees\History\Domain\Entity\Trace $trace */
                        return $trace->getApiaryId() === $request->getByApiaryId();
                    });
                }
            }
            $response->setTraceCollection($traceCollection);
        } catch (CollectionException|RepositoryException $e) {
            $response->setError(new ResponseError('trace.show.all.failed', [], $e));
        }
        $presenter->present($response);
    }

    /**
     * @param ShowTracesRequest $request
     * @return bool
     */
    private function hasFilters(ShowTracesRequest $request): bool
    {
        return !empty($request->getByApiaryId()) || !empty($request->getByBeehiveId()) || !empty($request->getByBeeKeeperId());
    }
}