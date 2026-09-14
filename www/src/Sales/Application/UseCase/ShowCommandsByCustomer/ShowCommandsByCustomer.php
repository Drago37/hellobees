<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\UseCase\ShowCommandsByCustomer;

use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\Sales\Domain\Repository\CommandRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\UseCase\ResponseError;

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
     * @param \HelloBees\Sales\Domain\Repository\CommandRepository $commandRepository
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