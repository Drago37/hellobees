<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Application\Query\ListCommandsByCustomer;

use HelloBees\Sales\Application\Query\ListCommandsByCustomer\ListCommandsByCustomerHandler;
use HelloBees\Sales\Application\Query\ListCommandsByCustomer\ListCommandsByCustomerQuery;
use HelloBees\Sales\Application\Query\ShowCommand\CommandView;
use HelloBees\Sales\Domain\Collection\ProductCollection;
use HelloBees\Sales\Domain\Entity\Command;
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

final class ListCommandsByCustomerHandlerTest extends TestCase
{
    private function aCustomer(Uuid $uuid): Customer
    {
        return new Customer(
            $uuid,
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

    public function testItReturnsOnlyTheCommandsOfTheGivenCustomer(): void
    {
        $customerRepository = new InMemoryCustomerRepository();
        $customer = $this->aCustomer(Uuid::generate());
        $customerRepository->insert($customer);
        $otherCustomer = $this->aCustomer(Uuid::generate());
        $customerRepository->insert($otherCustomer);

        $commandRepository = new InMemoryCommandRepository();
        $ownCommand = new Command(Uuid::generate(), DateTime::now(), new ProductCollection(), $customer, false);
        $commandRepository->insert($ownCommand);
        $commandRepository->insert(new Command(Uuid::generate(), DateTime::now(), new ProductCollection(), $otherCustomer, false));

        $handler = new ListCommandsByCustomerHandler($commandRepository, $customerRepository);

        $views = $handler(new ListCommandsByCustomerQuery($customer->getUuid()));

        self::assertCount(1, $views);
        self::assertContainsOnlyInstancesOf(CommandView::class, $views);
        self::assertSame((string) $ownCommand->getUuid(), $views[0]->uuid);
    }

    public function testItThrowsWhenTheCustomerDoesNotExist(): void
    {
        $handler = new ListCommandsByCustomerHandler(new InMemoryCommandRepository(), new InMemoryCustomerRepository());

        $this->expectException(CustomerNotFoundException::class);

        $handler(new ListCommandsByCustomerQuery(Uuid::generate()));
    }
}
