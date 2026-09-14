<?php

declare(strict_types=1);

namespace HelloBeesTest\BeeKeeping\Application\Command\DeleteBeekeeper;

use HelloBees\BeeKeeping\Application\Command\DeleteBeekeeper\DeleteBeekeeperCommand;
use HelloBees\BeeKeeping\Application\Command\DeleteBeekeeper\DeleteBeekeeperHandler;
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

final class DeleteBeekeeperHandlerTest extends TestCase
{
    public function testItDeletesAnExistingBeekeeper(): void
    {
        $repository = new InMemoryBeekeeperRepository();
        $uuid = Uuid::generate();
        $repository->insert(new BeeKeeper(
            $uuid,
            new NapiNumber('12345678'),
            new Username('Anthony', 'Graule'),
            new Email('anthony.graule@gmail.com'),
            BeeKeeperType::Amateur,
            DateTime::now(),
        ));

        (new DeleteBeekeeperHandler($repository))(new DeleteBeekeeperCommand($uuid));

        self::assertNull($repository->find($uuid));
    }

    public function testItThrowsWhenTheBeekeeperDoesNotExist(): void
    {
        $handler = new DeleteBeekeeperHandler(new InMemoryBeekeeperRepository());

        $this->expectException(BeekeeperNotFoundException::class);

        $handler(new DeleteBeekeeperCommand(Uuid::generate()));
    }
}
