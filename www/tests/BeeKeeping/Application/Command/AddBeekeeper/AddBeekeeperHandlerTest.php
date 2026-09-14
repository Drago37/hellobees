<?php

declare(strict_types=1);

namespace HelloBeesTest\BeeKeeping\Application\Command\AddBeekeeper;

use HelloBees\BeeKeeping\Application\Command\AddBeekeeper\AddBeekeeperCommand;
use HelloBees\BeeKeeping\Application\Command\AddBeekeeper\AddBeekeeperHandler;
use HelloBees\BeeKeeping\Domain\Enum\BeeKeeperType;
use HelloBees\BeeKeeping\Domain\ValueObject\NapiNumber;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBeesTest\BeeKeeping\Double\InMemoryBeekeeperRepository;
use PHPUnit\Framework\TestCase;

final class AddBeekeeperHandlerTest extends TestCase
{
    public function testItPersistsAndReturnsTheBeekeeper(): void
    {
        $repository = new InMemoryBeekeeperRepository();
        $handler = new AddBeekeeperHandler($repository);

        $command = new AddBeekeeperCommand(
            new NapiNumber('12345678'),
            new Username('Anthony', 'Graule'),
            new Email('anthony.graule@gmail.com'),
            BeeKeeperType::Professional,
        );

        $beeKeeper = $handler($command);

        // The handler returns the created aggregate...
        self::assertSame('12345678', (string) $beeKeeper->getNumeroNapi());
        self::assertSame('pro', $beeKeeper->getType()->value);

        // ...and it has been persisted under a generated identity.
        self::assertSame($beeKeeper, $repository->find($beeKeeper->getUuid()));
    }
}
