<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowAllTraces;

use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;
use HelloBees\Domain\Trace\Repository\TraceRepository;

/**
 * Class
 *
 * @class ShowAllTraces
 * @package HelloBees\Domain\Trace\UseCase\ShowAllTraces
 */
final readonly class ShowAllTraces
{
    /**
     * ShowAllTraces constructor
     *
     * @param TraceRepository $traceRepository
     */
    public function __construct(private TraceRepository $traceRepository)
    {
    }

    /**
     * @param ShowAllTracesPresenter $presenter
     * @return void
     */
    public function execute(ShowAllTracesPresenter $presenter): void
    {
        $response = new ShowAllTracesResponse();
        try {
            $traceCollection = $this->traceRepository->findAll();
            $response->setTraceCollection($traceCollection);
        } catch (CollectionException|RepositoryException $e) {
            $response->setError(new ResponseError('trace.show.all.failed', [], $e));
        }
        $presenter->present($response);
    }
}