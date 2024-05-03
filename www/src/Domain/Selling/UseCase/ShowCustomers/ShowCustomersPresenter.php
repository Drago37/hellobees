<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowCustomers;

/**
 * Interface
 *
 * @class ShowCustomersPresenter
 * @package HelloBees\Domain\Selling\UseCase\ShowCustomers
 */
interface ShowCustomersPresenter
{
    /**
     * @param ShowCustomersResponse $response
     * @return void
     */
    public function present(ShowCustomersResponse $response): void;
}