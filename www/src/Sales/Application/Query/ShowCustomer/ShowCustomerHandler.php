<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Query\ShowCustomer;

use HelloBees\Sales\Domain\Exception\CustomerNotFoundException;
use HelloBees\Sales\Domain\Repository\CustomerRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class ShowCustomerHandler
{
    public function __construct(
        private CustomerRepository $customerRepository,
    ) {
    }

    /**
     * @throws CustomerNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(ShowCustomerQuery $query): CustomerView
    {
        $customer = $this->customerRepository->find($query->uuid);

        if ($customer === null) {
            throw CustomerNotFoundException::withUuid($query->uuid);
        }

        return CustomerView::fromEntity($customer);
    }
}
