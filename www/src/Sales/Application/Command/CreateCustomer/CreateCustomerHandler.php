<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Command\CreateCustomer;

use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\Sales\Domain\Repository\CustomerRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class CreateCustomerHandler
{
    public function __construct(
        private CustomerRepository $customerRepository,
    ) {
    }

    /**
     * @throws RepositoryException
     */
    public function __invoke(CreateCustomerCommand $command): Customer
    {
        $customer = new Customer(
            Uuid::generate(),
            $command->username,
            $command->address,
            $command->email,
            $command->phoneNumber,
            DateTime::now(),
        );

        $this->customerRepository->insert($customer);

        return $customer;
    }
}
