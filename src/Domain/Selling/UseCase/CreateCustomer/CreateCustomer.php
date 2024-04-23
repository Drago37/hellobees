<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\CreateCustomer;

use HelloBees\Domain\Selling\Entity\Customer;
use HelloBees\Domain\Selling\Repository\CustomerRepository;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 *
 * @class CreateCustomer
 * @package HelloBees\Domain\Selling\UseCase\CreateCustomer
 */
final readonly class CreateCustomer
{
    /**
     * CreateCustomer constructor
     *
     * @param CustomerRepository $customerRepository
     */
    public function __construct(private CustomerRepository $customerRepository)
    {
    }

    /**
     * @param Customer $customer
     * @param CreateCustomerPresenter $presenter
     * @return void
     */
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