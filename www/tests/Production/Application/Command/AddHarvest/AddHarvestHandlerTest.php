<?php

declare(strict_types=1);

namespace HelloBeesTest\Production\Application\Command\AddHarvest;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\BeeKeeping\Domain\Collection\BeehiveCollection;
use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\BeeKeeping\Domain\Enum\ApiaryEnvironment;
use HelloBees\BeeKeeping\Domain\Enum\BeeKeeperType;
use HelloBees\BeeKeeping\Domain\Exception\ApiaryNotFoundException;
use HelloBees\BeeKeeping\Domain\ValueObject\NapiNumber;
use HelloBees\Production\Application\Command\AddHarvest\AddHarvestCommand;
use HelloBees\Production\Application\Command\AddHarvest\AddHarvestHandler;
use HelloBees\SharedKernel\Domain\Enum\HoneyType;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBees\SharedKernel\Domain\ValueObject\Map\Coordinates;
use HelloBeesTest\Production\Double\InMemoryApiaryRepository;
use HelloBeesTest\Production\Double\InMemoryHarvestRepository;
use PHPUnit\Framework\TestCase;

final class AddHarvestHandlerTest extends TestCase
{
    public function testItPersistsAndReturnsTheHarvest(): void
    {
        $harvestRepository = new InMemoryHarvestRepository();
        $apiaryRepository = new InMemoryApiaryRepository();
        $apiary = $this->createApiary();
        $apiaryRepository->insert($apiary);

        $handler = new AddHarvestHandler($harvestRepository, $apiaryRepository);

        $command = new AddHarvestCommand(
            DateTime::now(),
            HoneyType::Acacia,
            42,
            $apiary->getUuid(),
        );

        $harvest = $handler($command);

        self::assertSame(42, $harvest->getQuantity());
        self::assertSame('acacia', $harvest->getHoneyType()->value);
        self::assertSame($apiary, $harvest->getApiary());
        self::assertSame($harvest, $harvestRepository->find($harvest->getUuid()));
    }

    public function testItThrowsWhenTheApiaryDoesNotExist(): void
    {
        $handler = new AddHarvestHandler(new InMemoryHarvestRepository(), new InMemoryApiaryRepository());

        $this->expectException(ApiaryNotFoundException::class);

        $handler(new AddHarvestCommand(
            DateTime::now(),
            HoneyType::Acacia,
            42,
            Uuid::generate(),
        ));
    }

    private function createApiary(): Apiary
    {
        $beeKeeper = new BeeKeeper(
            Uuid::generate(),
            new NapiNumber('12345678'),
            new Username('Anthony', 'Graule'),
            new Email('anthony.graule@gmail.com'),
            BeeKeeperType::Amateur,
            DateTime::now(),
        );

        return new Apiary(
            Uuid::generate(),
            $beeKeeper,
            new BeehiveCollection(),
            new Coordinates(45.75, 4.85),
            ApiaryEnvironment::Countryside,
            DateTime::now(),
        );
    }
}
