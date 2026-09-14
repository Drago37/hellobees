<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Application\Query\ShowCustomer;

use HelloBees\Sales\Application\Query\ShowCustomer\CustomerView;
use HelloBees\Sales\Application\Query\ShowCustomer\ShowCustomerHandler;
use HelloBees\Sales\Application\Query\ShowCustomer\ShowCustomerQuery;
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

final class ShowCustomerHandlerTest extends TestCase
{
    public function testItReturnsAReadModelForAnExistingCustomer(): void
    {
        $repository = new InMemoryCustomerRepository();
        $uuid = Uuid::generate();
        $repository->insert(new Customer(
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
        ));

        $view = (new ShowCustomerHandler($repository))(new ShowCustomerQuery($uuid));

        self::assertInstanceOf(CustomerView::class, $view);
        self::assertSame((string) $uuid, $view->uuid);
        self::assertSame('Anthony Graule', $view->username);
        self::assertSame('anthony.graule@gmail.com', $view->email);
        self::assertSame('0612345678', $view->phoneNumber);
    }

    public function testItThrowsWhenTheCustomerDoesNotExist(): void
    {
        $handler = new ShowCustomerHandler(new InMemoryCustomerRepository());

        $this->expectException(CustomerNotFoundException::class);

        $handler(new ShowCustomerQuery(Uuid::generate()));
    }
}
