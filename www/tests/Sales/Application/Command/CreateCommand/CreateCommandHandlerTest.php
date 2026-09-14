<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Application\Command\CreateCommand;

use HelloBees\Sales\Application\Command\CreateCommand\CreateCommandCommand;
use HelloBees\Sales\Application\Command\CreateCommand\CreateCommandHandler;
use HelloBees\Sales\Domain\Collection\ProductCollection;
use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\Sales\Domain\Exception\CustomerNotFoundException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBees\SharedKernel\Domain\ValueObject\LiteralString;
use HelloBees\SharedKernel\Domain\ValueObject\Map\Address;
use HelloBeesTest\Sales\Double\InMemoryCommandRepository;
use HelloBeesTest\Sales\Double\InMemoryCustomerRepository;
use PHPUnit\Framework\TestCase;

final class CreateCommandHandlerTest extends TestCase
{
    public function testItPersistsAndReturnsTheCommandForAnExistingCustomer(): void
    {
        $customerRepository = new InMemoryCustomerRepository();
        $customerUuid = Uuid::generate();
        $customerRepository->insert(new Customer(
            $customerUuid,
            new Username('Anthony', 'Graule'),
            new Address(
                new LiteralString('1 rue des Abeilles'),
                new LiteralString('75000'),
                new LiteralString('Paris'),
                null,
                null,
            ),
            new Email('anthony.graule@gmail.com'),
            new PhoneNumber('0612345678'),
            DateTime::now(),
        ));
        $commandRepository = new InMemoryCommandRepository();

        $handler = new CreateCommandHandler($commandRepository, $customerRepository);

        $salesCommand = $handler(new CreateCommandCommand($customerUuid, new ProductCollection()));

        self::assertFalse($salesCommand->isPayed());
        self::assertSame($customerUuid->getValue(), $salesCommand->getCustomer()->getUuid()->getValue());
        self::assertSame($salesCommand, $commandRepository->find($salesCommand->getUuid()));
    }

    public function testItThrowsWhenTheCustomerDoesNotExist(): void
    {
        $handler = new CreateCommandHandler(new InMemoryCommandRepository(), new InMemoryCustomerRepository());

        $this->expectException(CustomerNotFoundException::class);

        $handler(new CreateCommandCommand(Uuid::generate(), new ProductCollection()));
    }
}
