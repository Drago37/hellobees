<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTraces;

/**
 * Interface
 *
 * @class ShowTracesPresenter
 * @package HelloBees\Domain\Trace\UseCase\ShowTraces
 */
interface ShowTracesPresenter
{
    /**
     * @param ShowTracesResponse $response
     * @return void
     */
    public function present(ShowTracesResponse $response): void;
}