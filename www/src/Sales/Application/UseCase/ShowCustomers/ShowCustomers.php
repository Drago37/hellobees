<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCustomers;

use HelloBees\Sales\Domain\Repository\CustomerRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

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