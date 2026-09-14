<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\UpdateCustomer;

interface UpdateCutomerPresenter
{
    public function present(UpdateCustomerResponse $response): void;
}