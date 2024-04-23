<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowAllTraces;

/**
 * Interface
 *
 * @class ShowAllTracesPresenter
 * @package HelloBees\Domain\Trace\UseCase\ShowAllTraces
 */
interface ShowAllTracesPresenter
{
    /**
     * @param ShowAllTracesResponse $response
     * @return void
     */
    public function present(ShowAllTracesResponse $response): void;
}