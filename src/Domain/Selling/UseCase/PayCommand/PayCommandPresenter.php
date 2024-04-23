<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\PayCommand;

/**
 * Interface
 *
 * @class PayCommandPresenter
 * @package HelloBees\Domain\Selling\UseCase\PayCommand
 */
interface PayCommandPresenter
{
    /**
     * @param PayCommandResponse $response
     * @return void
     */
    public function present(PayCommandResponse $response): void;
}