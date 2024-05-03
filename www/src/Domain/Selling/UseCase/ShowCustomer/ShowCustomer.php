<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowCustomer;

use HelloBees\Domain\Selling\Repository\CustomerRepository;
use HelloBees\Domain\Selling\UseCase\ShowCommands\ShowCommandsPresenter;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Class
 *
 * @class ShowCustomer
 * @package HelloBees\Domain\Selling\UseCase\ShowCustomer
 */
final readonly class ShowCustomer
{
    /**
     * ShowCustomer constructor
     *
     * @param CustomerRepository $customerRepository
     */
    public function __construct(private CustomerRepository $customerRepository)
    {
    }

    /**
     * @param Uuid $customerUuid
     * @param ShowCustomerPresenter $presenter
     * @return void
     */
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