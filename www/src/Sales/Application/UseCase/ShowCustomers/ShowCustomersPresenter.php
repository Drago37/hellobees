<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCustomers;

interface ShowCustomersPresenter
{
    public function present(ShowCustomersResponse $response): void;
}