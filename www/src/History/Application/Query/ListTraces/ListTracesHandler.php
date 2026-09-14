<?php

declare(strict_types=1);

namespace HelloBees\History\Application\Query\ListTraces;

use HelloBees\History\Application\Query\ShowTrace\TraceView;
use HelloBees\History\Domain\Entity\Trace;
use HelloBees\History\Domain\Repository\TraceRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class ListTracesHandler
{
    public function __construct(
        private TraceRepository $traceRepository,
    ) {
    }

    /**
     * @return list<TraceView>
     *
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function __invoke(ListTracesQuery $query): array
    {
        $traces = $this->traceRepository->findAll()->values();

        if ($query->beeKeeperId !== null) {
            $traces = array_values(array_filter(
                $traces,
                static fn (Trace $trace): bool => $trace->getBeeKeeperId() === $query->beeKeeperId,
            ));
        }

        if ($query->beehiveId !== null) {
            $traces = array_values(array_filter(
                $traces,
                static fn (Trace $trace): bool => $trace->getBeehiveId() === $query->beehiveId,
            ));
        }

        if ($query->apiaryId !== null) {
            $traces = array_values(array_filter(
                $traces,
                static fn (Trace $trace): bool => $trace->getApiaryId() === $query->apiaryId,
            ));
        }

        return array_map(
            static fn (Trace $trace): TraceView => TraceView::fromEntity($trace),
            $traces,
        );
    }
}
