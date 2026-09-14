<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\CreateCustomer;

use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\Sales\Domain\Repository\CustomerRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

final readonly class CreateCustomer
{
    public function __construct(private CustomerRepository $customerRepository)
    {
    }

    public function execute(Customer $customer, CreateCustomerPresenter $presenter): void
    {
        $response = new CreateCustomerResponse();
        try {
            $this->customerRepository->insert($customer);
        } catch (RepositoryException $e) {
            $response->setError(new ResponseError('customer.add.failed', ['customer' => $customer], $e));
        }
        $presenter->present($response);
    }
}