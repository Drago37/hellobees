<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCustomer;

interface ShowCustomerPresenter
{
    public function present(ShowCustomerResponse $response): void;
}