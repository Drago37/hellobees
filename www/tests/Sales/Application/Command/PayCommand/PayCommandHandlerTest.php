<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Application\Command\PayCommand;

use HelloBees\Sales\Application\Command\PayCommand\PayCommandCommand;
use HelloBees\Sales\Application\Command\PayCommand\PayCommandHandler;
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

final class PayCommandHandlerTest extends TestCase
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

    public function testItMarksAnExistingCommandAsPayed(): void
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

        $paid = (new PayCommandHandler($repository))(new PayCommandCommand($uuid));

        self::assertTrue($paid->isPayed());
        self::assertSame($paid, $repository->find($uuid));
    }

    public function testItThrowsWhenTheCommandDoesNotExist(): void
    {
        $handler = new PayCommandHandler(new InMemoryCommandRepository());

        $this->expectException(CommandNotFoundException::class);

        $handler(new PayCommandCommand(Uuid::generate()));
    }
}
