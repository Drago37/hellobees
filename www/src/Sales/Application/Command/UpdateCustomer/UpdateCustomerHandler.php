<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Command\UpdateCustomer;

use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\Sales\Domain\Exception\CustomerNotFoundException;
use HelloBees\Sales\Domain\Repository\CustomerRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class UpdateCustomerHandler
{
    public function __construct(
        private CustomerRepository $customerRepository,
    ) {
    }

    /**
     * @throws CustomerNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(UpdateCustomerCommand $command): Customer
    {
        $customer = $this->customerRepository->find($command->uuid);

        if ($customer === null) {
            throw CustomerNotFoundException::withUuid($command->uuid);
        }

        $customer
            ->setUsername($command->username)
            ->setAddress($command->address)
            ->setEmail($command->email)
            ->setPhoneNumber($command->phoneNumber);

        $this->customerRepository->update($customer);

        return $customer;
    }
}
