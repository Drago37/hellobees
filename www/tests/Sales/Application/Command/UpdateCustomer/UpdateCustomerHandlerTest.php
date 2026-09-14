<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Application\Command\UpdateCustomer;

use HelloBees\Sales\Application\Command\UpdateCustomer\UpdateCustomerCommand;
use HelloBees\Sales\Application\Command\UpdateCustomer\UpdateCustomerHandler;
use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\Sales\Domain\Exception\CustomerNotFoundException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBees\SharedKernel\Domain\ValueObject\LiteralString;
use HelloBees\SharedKernel\Domain\ValueObject\Map\Address;
use HelloBeesTest\Sales\Double\InMemoryCustomerRepository;
use PHPUnit\Framework\TestCase;

final class UpdateCustomerHandlerTest extends TestCase
{
    private function anAddress(): Address
    {
        return new Address(
            new LiteralString('1 rue des Abeilles'),
            new LiteralString('75000'),
            new LiteralString('Paris'),
            null,
            null,
        );
    }

    public function testItUpdatesAnExistingCustomer(): void
    {
        $repository = new InMemoryCustomerRepository();
        $uuid = Uuid::generate();
        $repository->insert(new Customer(
            $uuid,
            new Username('Anthony', 'Graule'),
            $this->anAddress(),
            new Email('anthony.graule@gmail.com'),
            new PhoneNumber('0612345678'),
            DateTime::now(),
        ));

        $updated = (new UpdateCustomerHandler($repository))(new UpdateCustomerCommand(
            $uuid,
            new Username('Jane', 'Doe'),
            $this->anAddress(),
            new Email('jane.doe@example.com'),
            new PhoneNumber('0698765432'),
        ));

        self::assertSame('Jane Doe', $updated->getUsername()->getFullName());
        self::assertSame('jane.doe@example.com', (string) $updated->getEmail());
        self::assertSame($updated, $repository->find($uuid));
    }

    public function testItThrowsWhenTheCustomerDoesNotExist(): void
    {
        $handler = new UpdateCustomerHandler(new InMemoryCustomerRepository());

        $this->expectException(CustomerNotFoundException::class);

        $handler(new UpdateCustomerCommand(
            Uuid::generate(),
            new Username('Jane', 'Doe'),
            $this->anAddress(),
            new Email('jane.doe@example.com'),
            new PhoneNumber('0698765432'),
        ));
    }
}
