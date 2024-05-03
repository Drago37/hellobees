<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\UseCase\ShowCommandsByCustomer;

use HelloBees\Domain\Selling\Entity\Customer;
use HelloBees\Domain\Selling\Repository\CommandRepository;
use HelloBees\Domain\SharedKernel\Exception\CollectionException;
use HelloBees\Domain\SharedKernel\Exception\RepositoryException;
use HelloBees\Domain\SharedKernel\UseCase\ResponseError;

/**
 * Class
 *
 * @class ShowCommandsByCustomer
 * @package HelloBees\Domain\Selling\UseCase\ShowCommandsByCustomer
 */
final readonly class ShowCommandsByCustomer
{
    /**
     * ShowCommandsByCustomer constructor
     *
     * @param CommandRepository $commandRepository
     */
    public function __construct(private CommandRepository $commandRepository)
    {
    }

    /**
     * @param Customer $customer
     * @param ShowCommandsByCustomerPresenter $presenter
     * @return void
     */
    public function execute(Customer $customer, ShowCommandsByCustomerPresenter $presenter): void
    {
        $response = new ShowCommandsByCustomerResponse();
        try {
            $commands = $this->commandRepository->findByCustomer($customer);
            $response->setCommands($commands);
        } catch (CollectionException|RepositoryException $e) {
            $response->setError(new ResponseError("command.find.by.customer.failed", ['customer' => $customer], $e));
        }
        $presenter->present($response);
    }
}