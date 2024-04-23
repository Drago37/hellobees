<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\ShowTracesByApiary;

/**
 * Interface
 *
 * @class ShowTracesByApiaryPresenter
 * @package HelloBees\Domain\Trace\UseCase\ShowTracesByApiary
 */
interface ShowTracesByApiaryPresenter
{
    /**
     * @param ShowTracesByApiaryResponse $response
     * @return void
     */
    public function present(ShowTracesByApiaryResponse $response): void;
}