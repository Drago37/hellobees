<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Application\Command\AbortCommand;

use HelloBees\Sales\Application\Command\AbortCommand\AbortCommandCommand;
use HelloBees\Sales\Application\Command\AbortCommand\AbortCommandHandler;
use HelloBees\Sales\Domain\Collection\ProductCollection;
use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\Sales\Domain\Exception\CommandNotFoundException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBees\SharedKernel\Domain\ValueObject\LiteralString;
use HelloBees\SharedKernel\Domain\ValueObject\Map\Address;
use HelloBeesTest\Sales\Double\InMemoryCommandRepository;
use PHPUnit\Framework\TestCase;

final class AbortCommandHandlerTest extends TestCase
{
    private function aCustomer(): Customer
    {
        return new Customer(
            Uuid::generate(),
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
        );
    }

    public function testItDeletesAnExistingCommand(): void
    {
        $repository = new InMemoryCommandRepository();
        $uuid = Uuid::generate();
        $repository->insert(new Command(
            $uuid,
            DateTime::now(),
            new ProductCollection(),
            $this->aCustomer(),
            false,
        ));

        (new AbortCommandHandler($repository))(new AbortCommandCommand($uuid));

        self::assertNull($repository->find($uuid));
    }

    public function testItThrowsWhenTheCommandDoesNotExist(): void
    {
        $handler = new AbortCommandHandler(new InMemoryCommandRepository());

        $this->expectException(CommandNotFoundException::class);

        $handler(new AbortCommandCommand(Uuid::generate()));
    }
}
