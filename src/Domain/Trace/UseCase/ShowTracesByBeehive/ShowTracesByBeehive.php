<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTracesByBeehive;

use HelloBees\Domain\BeeKeeping\Entity\Beehive;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;
use HelloBees\Domain\Trace\Repository\TraceRepository;

/**
 * Class
 *
 * @class ShowTracesByBeehive
 * @package HelloBees\Domain\Trace\UseCase\ShowTracesByBeehive
 */
final readonly class ShowTracesByBeehive
{
    /**
     * ShowTracesByBeehive constructor
     *
     * @param TraceRepository $traceRepository
     */
    public function __construct(private TraceRepository $traceRepository)
    {
    }

    /**
     * @param Beehive $beehive
     * @param ShowTracesByBeehivePresenter $presenter
     * @return void
     */
    public function execute(Beehive $beehive, ShowTracesByBeehivePresenter $presenter): void
    {
        $response = new ShowTracesByBeehiveResponse();
        try {
            $traceCollection = $this->traceRepository->findByBeehive($beehive);
            $response->setTraceCollection($traceCollection);
        } catch (CollectionException|RepositoryException $e) {
            $response->setError(new ResponseError('trace.show.by.beehive.failed', ['beehive' => $beehive], $e));
        }
        $presenter->present($response);
    }
}