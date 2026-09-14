<?php

declare(strict_types=1);

namespace HelloBees\History\Application\Query\ShowTrace;

use HelloBees\History\Domain\Exception\TraceNotFoundException;
use HelloBees\History\Domain\Repository\TraceRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class ShowTraceHandler
{
    public function __construct(
        private TraceRepository $traceRepository,
    ) {
    }

    /**
     * @throws TraceNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(ShowTraceQuery $query): TraceView
    {
        $trace = $this->traceRepository->find($query->uuid);

        if ($trace === null) {
            throw TraceNotFoundException::withUuid($query->uuid);
        }

        return TraceView::fromEntity($trace);
    }
}
