<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCustomer;

use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

class ShowCustomerResponse extends UseCaseResponse
{
    private Customer $customer;

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): ShowCustomerResponse
    {
        $this->customer = $customer;
        return $this;
    }

}