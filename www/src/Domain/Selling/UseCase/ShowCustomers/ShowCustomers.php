<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowCustomers;

use HelloBees\Domain\Selling\Repository\CustomerRepository;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 *
 * @class ShowCustomers
 * @package HelloBees\Domain\Selling\UseCase\ShowCustomers
 */
final readonly class ShowCustomers
{
    /**
     * ShowCustomers constructor
     *
     * @param CustomerRepository $customerRepository
     */
    public function __construct(private CustomerRepository $customerRepository)
    {
    }

    /**
     * @param ShowCustomersPresenter $presenter
     * @return void
     */
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