<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCustomers;

use HelloBees\Sales\Domain\Collection\CustomerCollection;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

class ShowCustomersResponse extends UseCaseResponse
{
    private CustomerCollection $customers;

    public function getCustomers(): CustomerCollection
    {
        return $this->customers;
    }

    public function setCustomers(CustomerCollection $customers): ShowCustomersResponse
    {
        $this->customers = $customers;
        return $this;
    }

}