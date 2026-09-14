<?php

declare(strict_types=1);

namespace HelloBeesTest\Production\Application\Query\ShowHarvest;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\BeeKeeping\Domain\Collection\BeehiveCollection;
use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\BeeKeeping\Domain\Enum\ApiaryEnvironment;
use HelloBees\BeeKeeping\Domain\Enum\BeeKeeperType;
use HelloBees\BeeKeeping\Domain\ValueObject\NapiNumber;
use HelloBees\Production\Application\Query\ShowHarvest\HarvestView;
use HelloBees\Production\Application\Query\ShowHarvest\ShowHarvestHandler;
use HelloBees\Production\Application\Query\ShowHarvest\ShowHarvestQuery;
use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\Production\Domain\Exception\HarvestNotFoundException;
use HelloBees\SharedKernel\Domain\Enum\HoneyType;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBees\SharedKernel\Domain\ValueObject\Map\Coordinates;
use HelloBeesTest\Production\Double\InMemoryHarvestRepository;
use PHPUnit\Framework\TestCase;

final class ShowHarvestHandlerTest extends TestCase
{
    public function testItReturnsAReadModelForAnExistingHarvest(): void
    {
        $repository = new InMemoryHarvestRepository();
        $apiary = $this->createApiary();
        $uuid = Uuid::generate();
        $repository->insert(new Harvest(
            $uuid,
            DateTime::now(),
            DateTime::now(),
            HoneyType::Acacia,
            42,
            $apiary,
        ));

        $view = (new ShowHarvestHandler($repository))(new ShowHarvestQuery($uuid));

        self::assertInstanceOf(HarvestView::class, $view);
        self::assertSame((string) $uuid, $view->uuid);
        self::assertSame('acacia', $view->honeyType);
        self::assertSame(42, $view->quantity);
        self::assertSame((string) $apiary->getUuid(), $view->apiaryUuid);
    }

    public function testItThrowsWhenTheHarvestDoesNotExist(): void
    {
        $handler = new ShowHarvestHandler(new InMemoryHarvestRepository());

        $this->expectException(HarvestNotFoundException::class);

        $handler(new ShowHarvestQuery(Uuid::generate()));
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
