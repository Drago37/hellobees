<?php

declare(strict_types=1);

namespace HelloBeesTest\Sales\Application\Query\ListCommands;

use HelloBees\Sales\Application\Query\ListCommands\ListCommandsHandler;
use HelloBees\Sales\Application\Query\ListCommands\ListCommandsQuery;
use HelloBees\Sales\Application\Query\ShowCommand\CommandView;
use HelloBees\Sales\Domain\Collection\ProductCollection;
use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\Sales\Domain\Entity\Customer;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBees\SharedKernel\Domain\ValueObject\LiteralString;
use HelloBees\SharedKernel\Domain\ValueObject\Map\Address;
use HelloBeesTest\Sales\Double\InMemoryCommandRepository;
use PHPUnit\Framework\TestCase;

final class ListCommandsHandlerTest extends TestCase
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

    public function testItReturnsAnEmptyListWhenThereIsNoCommand(): void
    {
        $handler = new ListCommandsHandler(new InMemoryCommandRepository());

        self::assertSame([], $handler(new ListCommandsQuery()));
    }

    public function testItReturnsOneReadModelPerCommand(): void
    {
        $repository = new InMemoryCommandRepository();
        $uuids = [];
        foreach ([false, true] as $payed) {
            $command = new Command(
                Uuid::generate(),
                DateTime::now(),
                new ProductCollection(),
                $this->aCustomer(),
                $payed,
            );
            $uuids[] = (string) $command->getUuid();
            $repository->insert($command);
        }

        $views = (new ListCommandsHandler($repository))(new ListCommandsQuery());

        self::assertCount(2, $views);
        self::assertContainsOnlyInstancesOf(CommandView::class, $views);
        self::assertEqualsCanonicalizing(
            $uuids,
            array_map(static fn (CommandView $view): string => $view->uuid, $views),
        );
    }
}
