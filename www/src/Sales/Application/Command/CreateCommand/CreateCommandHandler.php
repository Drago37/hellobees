<?php

declare(strict_types=1);

namespace HelloBees\Sales\Application\Command\CreateCommand;

use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\Sales\Domain\Exception\CustomerNotFoundException;
use HelloBees\Sales\Domain\Repository\CommandRepository;
use HelloBees\Sales\Domain\Repository\CustomerRepository;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class CreateCommandHandler
{
    public function __construct(
        private CommandRepository $commandRepository,
        private CustomerRepository $customerRepository,
    ) {
    }

    /**
     * @throws CustomerNotFoundException
     * @throws RepositoryException
     */
    public function __invoke(CreateCommandCommand $command): Command
    {
        $customer = $this->customerRepository->find($command->customerUuid);

        if ($customer === null) {
            throw CustomerNotFoundException::withUuid($command->customerUuid);
        }

        $salesCommand = new Command(
            Uuid::generate(),
            DateTime::now(),
            $command->productCollection,
            $customer,
            false,
        );

        $this->commandRepository->insert($salesCommand);

        return $salesCommand;
    }
}
