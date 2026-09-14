<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCommandsByCustomer;

interface ShowCommandsByCustomerPresenter
{
    public function present(ShowCommandsByCustomerResponse $response): void;
}