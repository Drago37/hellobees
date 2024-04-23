<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTracesByApiary;

use HelloBees\Domain\BeeKeeping\Aggregate\Apiary;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;
use HelloBees\Domain\Trace\Repository\TraceRepository;

/**
 * Class
 *
 * @class ShowTracesByApiary
 * @package HelloBees\Domain\Trace\UseCase\ShowTracesByApiary
 */
final readonly class ShowTracesByApiary
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
     * @param Apiary $apiary
     * @param ShowTracesByApiaryPresenter $presenter
     * @return void
     */
    public function execute(Apiary $apiary, ShowTracesByApiaryPresenter $presenter): void
    {
        $response = new ShowTracesByApiaryResponse();
        try {
            $traceCollection = $this->traceRepository->findByApiary($apiary);
            $response->setTraceCollection($traceCollection);
        } catch (CollectionException|RepositoryException $e) {
            $response->setError(new ResponseError('trace.show.by.apiary.failed', [], $e));
        }
        $presenter->present($response);
    }
}