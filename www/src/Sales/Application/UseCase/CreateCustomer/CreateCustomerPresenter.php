<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\CreateCustomer;

interface CreateCustomerPresenter
{
    public function present(CreateCustomerResponse $response): void;
}