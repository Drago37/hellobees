<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Query\ListCustomers;

use HelloBees\Sales\Application\Query\ShowCustomer\CustomerView;
use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\Sales\Domain\Repository\CustomerRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class ListCustomersHandler
{
    public function __construct(
        private CustomerRepository $customerRepository,
    ) {
    }

    /**
     * @return list<CustomerView>
     *
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function __invoke(ListCustomersQuery $query): array
    {
        return array_map(
            static fn (Customer $customer): CustomerView => CustomerView::fromEntity($customer),
            $this->customerRepository->findAll()->values(),
        );
    }
}
