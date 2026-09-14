<?php

declare(strict_types=1);

namespace HelloBeesTest\BeeKeeping\Application\Command\UpdateBeekeeper;

use HelloBees\BeeKeeping\Application\Command\UpdateBeekeeper\UpdateBeekeeperCommand;
use HelloBees\BeeKeeping\Application\Command\UpdateBeekeeper\UpdateBeekeeperHandler;
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

final class UpdateBeekeeperHandlerTest extends TestCase
{
    public function testItUpdatesAnExistingBeekeeper(): void
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

        $updated = (new UpdateBeekeeperHandler($repository))(new UpdateBeekeeperCommand(
            $uuid,
            new NapiNumber('A1234567'),
            new Username('Jane', 'Doe'),
            new Email('jane.doe@example.com'),
            BeeKeeperType::Professional,
        ));

        self::assertSame('A1234567', (string) $updated->getNumeroNapi());
        self::assertSame('Jane Doe', $updated->getUsername()->getFullName());
        self::assertSame('pro', $updated->getType()->value);
        self::assertSame($updated, $repository->find($uuid));
    }

    public function testItThrowsWhenTheBeekeeperDoesNotExist(): void
    {
        $handler = new UpdateBeekeeperHandler(new InMemoryBeekeeperRepository());

        $this->expectException(BeekeeperNotFoundException::class);

        $handler(new UpdateBeekeeperCommand(
            Uuid::generate(),
            new NapiNumber('12345678'),
            new Username('Jane', 'Doe'),
            new Email('jane.doe@example.com'),
            BeeKeeperType::Professional,
        ));
    }
}
