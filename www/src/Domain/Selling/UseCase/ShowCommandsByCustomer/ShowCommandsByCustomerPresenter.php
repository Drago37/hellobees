<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowCommandsByCustomer;

/**
 * Interface
 *
 * @class ShowCommandsByCustomerPresenter
 * @package HelloBees\Domain\Selling\UseCase\ShowCommandsByCustomer
 */
interface ShowCommandsByCustomerPresenter
{
    /**
     * @param ShowCommandsByCustomerResponse $response
     * @return void
     */
    public function present(ShowCommandsByCustomerResponse $response): void;
}