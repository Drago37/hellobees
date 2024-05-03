<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowCustomers;

use HelloBees\Domain\Selling\Collection\CustomerCollection;
use HelloBees\Domain\SharedKernel\UseCase\UseCaseResponse;

/**
 * Class
 *
 * @class ShowCustomersResponse
 * @package HelloBees\Domain\Selling\UseCase\ShowCustomers
 */
class ShowCustomersResponse extends UseCaseResponse
{
    /** @var CustomerCollection */
    private CustomerCollection $customers;

    /**
     * @return CustomerCollection
     */
    public function getCustomers(): CustomerCollection
    {
        return $this->customers;
    }

    /**
     * @param CustomerCollection $customers
     * @return ShowCustomersResponse
     */
    public function setCustomers(CustomerCollection $customers): ShowCustomersResponse
    {
        $this->customers = $customers;
        return $this;
    }

}