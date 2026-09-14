<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCustomer;

/**
 * Interface
 *
 * @class ShowCustomerPresenter
 * @package HelloBees\Domain\Selling\UseCase\ShowCustomer
 */
interface ShowCustomerPresenter
{
    /**
     * @param ShowCustomerResponse $response
     * @return void
     */
    public function present(ShowCustomerResponse $response): void;
}