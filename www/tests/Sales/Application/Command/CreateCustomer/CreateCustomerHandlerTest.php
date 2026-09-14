<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Application\Command\CreateCustomer;

use HelloBees\Sales\Application\Command\CreateCustomer\CreateCustomerCommand;
use HelloBees\Sales\Application\Command\CreateCustomer\CreateCustomerHandler;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\LiteralString;
use HelloBees\SharedKernel\Domain\ValueObject\Map\Address;
use HelloBeesTest\Sales\Double\InMemoryCustomerRepository;
use PHPUnit\Framework\TestCase;

final class CreateCustomerHandlerTest extends TestCase
{
    public function testItPersistsAndReturnsTheCustomer(): void
    {
        $repository = new InMemoryCustomerRepository();
        $handler = new CreateCustomerHandler($repository);

        $command = new CreateCustomerCommand(
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
        );

        $customer = $handler($command);

        self::assertSame('Anthony Graule', $customer->getUsername()->getFullName());
        self::assertSame('anthony.graule@gmail.com', (string) $customer->getEmail());
        self::assertSame($customer, $repository->find($customer->getUuid()));
    }
}
