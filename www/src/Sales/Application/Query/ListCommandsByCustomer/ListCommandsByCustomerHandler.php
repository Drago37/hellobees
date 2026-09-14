<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Query\ListCommandsByCustomer;

use HelloBees\Sales\Application\Query\ShowCommand\CommandView;
use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\Sales\Domain\Exception\CustomerNotFoundException;
use HelloBees\Sales\Domain\Repository\CommandRepository;
use HelloBees\Sales\Domain\Repository\CustomerRepository;
use HelloBees\SharedKernel\Domain\Exception\CollectionException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;

final readonly class ListCommandsByCustomerHandler
{
    public function __construct(
        private CommandRepository $commandRepository,
        private CustomerRepository $customerRepository,
    ) {
    }

    /**
     * @return list<CommandView>
     *
     * @throws CustomerNotFoundException
     * @throws RepositoryException
     * @throws CollectionException
     */
    public function __invoke(ListCommandsByCustomerQuery $query): array
    {
        $customer = $this->customerRepository->find($query->customerUuid);

        if ($customer === null) {
            throw CustomerNotFoundException::withUuid($query->customerUuid);
        }

        return array_map(
            static fn (Command $command): CommandView => CommandView::fromEntity($command),
            $this->commandRepository->findByCustomer($customer)->values(),
        );
    }
}
