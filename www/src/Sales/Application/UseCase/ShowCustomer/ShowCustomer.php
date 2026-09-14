<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCustomer;

use HelloBees\Sales\Domain\Repository\CustomerRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class ShowCustomer
{
    public function __construct(private CustomerRepository $customerRepository)
    {
    }

    public function execute(Uuid $customerUuid, ShowCustomerPresenter $presenter): void
    {
        $response = new ShowCustomerResponse();
        try {
            $customer = $this->customerRepository->find($customerUuid);
            if (is_null($customer)) {
                $response->setError(new ResponseError("customer.not.found", ['uuid' => $customerUuid]));
            } else {
                $response->setCustomer($customer);
            }
        } catch (RepositoryException $e) {
            $response->setError(new ResponseError("customer.find.failed", ['uuid' => $customerUuid], $e));
        }
        $presenter->present($response);
    }
}