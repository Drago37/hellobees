<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Application\Query\ShowCommand;

use HelloBees\Sales\Application\Query\ShowCommand\CommandView;
use HelloBees\Sales\Application\Query\ShowCommand\ShowCommandHandler;
use HelloBees\Sales\Application\Query\ShowCommand\ShowCommandQuery;
use HelloBees\Sales\Domain\Collection\ProductCollection;
use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\Sales\Domain\Entity\Product;
use HelloBees\Sales\Domain\Enum\ProductType;
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

final class ShowCommandHandlerTest extends TestCase
{
    public function testItReturnsAReadModelForAnExistingCommand(): void
    {
        $repository = new InMemoryCommandRepository();
        $uuid = Uuid::generate();
        $customer = new Customer(
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
        $product = new Product(
            Uuid::generate(),
            ProductType::Honey,
            10,
            5.0,
            'Acacia honey jar',
            'Description',
            '/images/honey.jpg',
            DateTime::now(),
        );
        $repository->insert(new Command(
            $uuid,
            DateTime::now(),
            new ProductCollection([$product]),
            $customer,
            true,
        ));

        $view = (new ShowCommandHandler($repository))(new ShowCommandQuery($uuid));

        self::assertInstanceOf(CommandView::class, $view);
        self::assertSame((string) $uuid, $view->uuid);
        self::assertSame((string) $customer->getUuid(), $view->customerUuid);
        self::assertSame([(string) $product->getUuid()], $view->productUuids);
        self::assertTrue($view->payed);
    }

    public function testItThrowsWhenTheCommandDoesNotExist(): void
    {
        $handler = new ShowCommandHandler(new InMemoryCommandRepository());

        $this->expectException(CommandNotFoundException::class);

        $handler(new ShowCommandQuery(Uuid::generate()));
    }
}
