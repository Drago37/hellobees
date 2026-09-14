<?php

declare(strict_types=1);

namespace HelloBeesTest\Production\Application\Command\UpdateHarvest;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\BeeKeeping\Domain\Collection\BeehiveCollection;
use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\BeeKeeping\Domain\Enum\ApiaryEnvironment;
use HelloBees\BeeKeeping\Domain\Enum\BeeKeeperType;
use HelloBees\BeeKeeping\Domain\Exception\ApiaryNotFoundException;
use HelloBees\BeeKeeping\Domain\ValueObject\NapiNumber;
use HelloBees\Production\Application\Command\UpdateHarvest\UpdateHarvestCommand;
use HelloBees\Production\Application\Command\UpdateHarvest\UpdateHarvestHandler;
use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\Production\Domain\Exception\HarvestNotFoundException;
use HelloBees\SharedKernel\Domain\Enum\HoneyType;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBees\SharedKernel\Domain\ValueObject\Map\Coordinates;
use HelloBeesTest\Production\Double\InMemoryApiaryRepository;
use HelloBeesTest\Production\Double\InMemoryHarvestRepository;
use PHPUnit\Framework\TestCase;

final class UpdateHarvestHandlerTest extends TestCase
{
    public function testItUpdatesAnExistingHarvest(): void
    {
        $harvestRepository = new InMemoryHarvestRepository();
        $apiaryRepository = new InMemoryApiaryRepository();

        $apiary = $this->createApiary();
        $apiaryRepository->insert($apiary);

        $newApiary = $this->createApiary();
        $apiaryRepository->insert($newApiary);

        $uuid = Uuid::generate();
        $harvestRepository->insert(new Harvest(
            $uuid,
            DateTime::now(),
            DateTime::now(),
            HoneyType::Acacia,
            10,
            $apiary,
        ));

        $updated = (new UpdateHarvestHandler($harvestRepository, $apiaryRepository))(new UpdateHarvestCommand(
            $uuid,
            DateTime::now(),
            HoneyType::Lavender,
            25,
            $newApiary->getUuid(),
        ));

        self::assertSame(25, $updated->getQuantity());
        self::assertSame('lavender', $updated->getHoneyType()->value);
        self::assertSame($newApiary, $updated->getApiary());
        self::assertSame($updated, $harvestRepository->find($uuid));
    }

    public function testItThrowsWhenTheHarvestDoesNotExist(): void
    {
        $apiaryRepository = new InMemoryApiaryRepository();
        $apiary = $this->createApiary();
        $apiaryRepository->insert($apiary);

        $handler = new UpdateHarvestHandler(new InMemoryHarvestRepository(), $apiaryRepository);

        $this->expectException(HarvestNotFoundException::class);

        $handler(new UpdateHarvestCommand(
            Uuid::generate(),
            DateTime::now(),
            HoneyType::Lavender,
            25,
            $apiary->getUuid(),
        ));
    }

    public function testItThrowsWhenTheApiaryDoesNotExist(): void
    {
        $harvestRepository = new InMemoryHarvestRepository();
        $apiary = $this->createApiary();

        $uuid = Uuid::generate();
        $harvestRepository->insert(new Harvest(
            $uuid,
            DateTime::now(),
            DateTime::now(),
            HoneyType::Acacia,
            10,
            $apiary,
        ));

        $handler = new UpdateHarvestHandler($harvestRepository, new InMemoryApiaryRepository());

        $this->expectException(ApiaryNotFoundException::class);

        $handler(new UpdateHarvestCommand(
            $uuid,
            DateTime::now(),
            HoneyType::Lavender,
            25,
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
