<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCustomers;

use HelloBees\Sales\Domain\Repository\CustomerRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

final readonly class ShowCustomers
{
    public function __construct(private CustomerRepository $customerRepository)
    {
    }

    public function execute(ShowCustomersPresenter $presenter): void
    {
        $response = new ShowCustomersResponse();
        try {
            $customers = $this->customerRepository->findAll();
            $response->setCustomers($customers);
        } catch (CollectionException|RepositoryException $e) {
            $response->setError(new ResponseError("customer.find_all.failed", [], $e));
        }
        $presenter->present($response);
    }
}