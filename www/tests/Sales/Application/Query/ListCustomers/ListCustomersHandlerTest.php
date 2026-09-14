<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Application\Query\ListCustomers;

use HelloBees\Sales\Application\Query\ListCustomers\ListCustomersHandler;
use HelloBees\Sales\Application\Query\ListCustomers\ListCustomersQuery;
use HelloBees\Sales\Application\Query\ShowCustomer\CustomerView;
use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBees\SharedKernel\Domain\ValueObject\LiteralString;
use HelloBees\SharedKernel\Domain\ValueObject\Map\Address;
use HelloBeesTest\Sales\Double\InMemoryCustomerRepository;
use PHPUnit\Framework\TestCase;

final class ListCustomersHandlerTest extends TestCase
{
    public function testItReturnsAnEmptyListWhenThereIsNoCustomer(): void
    {
        $handler = new ListCustomersHandler(new InMemoryCustomerRepository());

        self::assertSame([], $handler(new ListCustomersQuery()));
    }

    public function testItReturnsOneReadModelPerCustomer(): void
    {
        $repository = new InMemoryCustomerRepository();
        foreach ([['Anthony', 'Graule'], ['Jane', 'Doe']] as [$firstName, $lastName]) {
            $repository->insert(new Customer(
                Uuid::generate(),
                new Username($firstName, $lastName),
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
        }

        $views = (new ListCustomersHandler($repository))(new ListCustomersQuery());

        self::assertCount(2, $views);
        self::assertContainsOnlyInstancesOf(CustomerView::class, $views);
        self::assertEqualsCanonicalizing(
            ['Anthony Graule', 'Jane Doe'],
            array_map(static fn (CustomerView $view): string => $view->username, $views),
        );
    }
}
