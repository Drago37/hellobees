<?php

declare(strict_types=1);

namespace HelloBeesTest\BeeKeeping\Application\Query\ShowBeekeeper;

use HelloBees\BeeKeeping\Application\Query\ShowBeekeeper\BeekeeperView;
use HelloBees\BeeKeeping\Application\Query\ShowBeekeeper\ShowBeekeeperHandler;
use HelloBees\BeeKeeping\Application\Query\ShowBeekeeper\ShowBeekeeperQuery;
use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\BeeKeeping\Domain\Enum\BeeKeeperType;
use HelloBees\BeeKeeping\Domain\Exception\BeekeeperNotFoundException;
use HelloBees\BeeKeeping\Domain\ValueObject\NapiNumber;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBeesTest\BeeKeeping\Double\InMemoryBeekeeperRepository;
use PHPUnit\Framework\TestCase;

final class ShowBeekeeperHandlerTest extends TestCase
{
    public function testItReturnsAReadModelForAnExistingBeekeeper(): void
    {
        $repository = new InMemoryBeekeeperRepository();
        $uuid = Uuid::generate();
        $repository->insert(new BeeKeeper(
            $uuid,
            new NapiNumber('12345678'),
            new Username('Anthony', 'Graule'),
            new Email('anthony.graule@gmail.com'),
            BeeKeeperType::Professional,
            DateTime::now(),
        ));

        $view = (new ShowBeekeeperHandler($repository))(new ShowBeekeeperQuery($uuid));

        self::assertInstanceOf(BeekeeperView::class, $view);
        self::assertSame((string) $uuid, $view->uuid);
        self::assertSame('12345678', $view->napiNumber);
        self::assertSame('Anthony Graule', $view->username);
        self::assertSame('anthony.graule@gmail.com', $view->email);
        self::assertSame('pro', $view->type);
    }

    public function testItThrowsWhenTheBeekeeperDoesNotExist(): void
    {
        $handler = new ShowBeekeeperHandler(new InMemoryBeekeeperRepository());

        $this->expectException(BeekeeperNotFoundException::class);

        $handler(new ShowBeekeeperQuery(Uuid::generate()));
    }
}
