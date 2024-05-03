<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowCustomer;

use HelloBees\Domain\Selling\Entity\Customer;
use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowCustomerResponse
 * @package HelloBees\Domain\Selling\UseCase\ShowCustomer
 */
class ShowCustomerResponse extends UseCaseResponse
{
    /**
     * @var Customer
     */
    private Customer $customer;

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return ShowCustomerResponse
     */
    public function setCustomer(Customer $customer): ShowCustomerResponse
    {
        $this->customer = $customer;
        return $this;
    }

}