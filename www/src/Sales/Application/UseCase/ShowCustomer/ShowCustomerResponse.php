<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCustomer;

use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowCustomerResponse
 * @package HelloBees\Domain\Selling\UseCase\ShowCustomer
 */
class ShowCustomerResponse extends UseCaseResponse
{
    /**
     * @var \HelloBees\Sales\Domain\Entity\Customer
     */
    private Customer $customer;

    /**
     * @return \HelloBees\Sales\Domain\Entity\Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param \HelloBees\Sales\Domain\Entity\Customer $customer
     *
     * @return ShowCustomerResponse
     */
    public function setCustomer(Customer $customer): ShowCustomerResponse
    {
        $this->customer = $customer;
        return $this;
    }

}