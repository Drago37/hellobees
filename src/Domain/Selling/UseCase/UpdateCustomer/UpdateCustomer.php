<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\UpdateCustomer;

use HelloBees\Domain\Selling\Entity\Customer;
use HelloBees\Domain\Selling\Repository\CustomerRepository;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 *
 * @class UpdateCustomer
 * @package HelloBees\Domain\Selling\UseCase\UpdateCustomer
 */
final readonly class UpdateCustomer
{
    /**
     * UpdateCustomer constructor
     *
     * @param CustomerRepository $customerRepository
     */
    public function __construct(private CustomerRepository $customerRepository)
    {
    }

    /**
     * @param Customer $customer
     * @param UpdateCutomerPresenter $presenter
     * @return void
     */
    public function execute(Customer $customer, UpdateCutomerPresenter $presenter): void
    {
        $response = new UpdateCustomerResponse();
        try {
            $this->customerRepository->update($customer);
        } catch (RepositoryException $e) {
            $response->setError(new ResponseError("customer.update.failed", ['customer' => $customer], $e));
        }
        $presenter->present($response);
    }
}