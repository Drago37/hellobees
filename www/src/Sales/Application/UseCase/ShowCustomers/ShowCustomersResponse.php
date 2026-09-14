<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCustomers;

use HelloBees\Sales\Domain\Collection\CustomerCollection;
use HelloBees\SharedKernel\Domain\UseCase\UseCaseResponse;

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
     * @param \HelloBees\Sales\Domain\Collection\CustomerCollection $customers
     *
     * @return ShowCustomersResponse
     */
    public function setCustomers(CustomerCollection $customers): ShowCustomersResponse
    {
        $this->customers = $customers;
        return $this;
    }

}