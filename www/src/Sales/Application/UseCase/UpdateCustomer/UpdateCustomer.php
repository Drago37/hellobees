<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\UpdateCustomer;

use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\Sales\Domain\Repository\CustomerRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

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
     * @param \HelloBees\Sales\Domain\Entity\Customer $customer
     * @param UpdateCutomerPresenter $presenter
     *
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