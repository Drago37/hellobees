<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTracesByBeeKeeper;

use HelloBees\Domain\BeeKeeping\Entity\BeeKeeper;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;
use HelloBees\Domain\Trace\Repository\TraceRepository;

/**
 * Class
 *
 * @class ShowTracesByBeeKeeper
 * @package HelloBees\Domain\Trace\UseCase\ShowTracesByBeeKeeper
 */
final readonly class ShowTracesByBeeKeeper
{
    /**
     * ShowTracesByBeeKeeper constructor
     *
     * @param TraceRepository $traceRepository
     */
    public function __construct(private TraceRepository $traceRepository)
    {
    }

    /**
     * @param BeeKeeper $beeKeeper
     * @param ShowTracesByBeeKeeperPresenter $presenter
     * @return void
     */
    public function execute(BeeKeeper $beeKeeper, ShowTracesByBeeKeeperPresenter $presenter): void
    {
        $response = new ShowTracesByBeeKeeperResponse();
        try {
            $traceCollection = $this->traceRepository->findByBeeKeeper($beeKeeper);
            $response->setTraceCollection($traceCollection);
        } catch (CollectionException|RepositoryException $e) {
            $response->setError(new ResponseError('trace.show.by.beekeeper.failed', ['beehive' => $beehive], $e));
        }
        $presenter->present($response);
    }
}