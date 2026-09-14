<?php

declare(strict_types=1);

namespace HelloBeesTest\Production\Application\Query\ListHarvestsByApiary;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\BeeKeeping\Domain\Collection\BeehiveCollection;
use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\BeeKeeping\Domain\Enum\ApiaryEnvironment;
use HelloBees\BeeKeeping\Domain\Enum\BeeKeeperType;
use HelloBees\BeeKeeping\Domain\Exception\ApiaryNotFoundException;
use HelloBees\BeeKeeping\Domain\ValueObject\NapiNumber;
use HelloBees\Production\Application\Query\ListHarvestsByApiary\ListHarvestsByApiaryHandler;
use HelloBees\Production\Application\Query\ListHarvestsByApiary\ListHarvestsByApiaryQuery;
use HelloBees\Production\Application\Query\ShowHarvest\HarvestView;
use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\SharedKernel\Domain\Enum\HoneyType;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBees\SharedKernel\Domain\ValueObject\Map\Coordinates;
use HelloBeesTest\Production\Double\InMemoryApiaryRepository;
use HelloBeesTest\Production\Double\InMemoryHarvestRepository;
use PHPUnit\Framework\TestCase;

final class ListHarvestsByApiaryHandlerTest extends TestCase
{
    public function testItReturnsOnlyHarvestsOfTheGivenApiary(): void
    {
        $harvestRepository = new InMemoryHarvestRepository();
        $apiaryRepository = new InMemoryApiaryRepository();

        $apiary = $this->createApiary();
        $otherApiary = $this->createApiary();
        $apiaryRepository->insert($apiary);
        $apiaryRepository->insert($otherApiary);

        $harvestRepository->insert(new Harvest(
            Uuid::generate(),
            DateTime::now(),
            DateTime::now(),
            HoneyType::Acacia,
            10,
            $apiary,
        ));
        $harvestRepository->insert(new Harvest(
            Uuid::generate(),
            DateTime::now(),
            DateTime::now(),
            HoneyType::Lavender,
            20,
            $otherApiary,
        ));

        $views = (new ListHarvestsByApiaryHandler($harvestRepository, $apiaryRepository))(
            new ListHarvestsByApiaryQuery($apiary->getUuid()),
        );

        self::assertCount(1, $views);
        self::assertContainsOnlyInstancesOf(HarvestView::class, $views);
        self::assertSame(10, $views[0]->quantity);
        self::assertSame((string) $apiary->getUuid(), $views[0]->apiaryUuid);
    }

    public function testItThrowsWhenTheApiaryDoesNotExist(): void
    {
        $handler = new ListHarvestsByApiaryHandler(new InMemoryHarvestRepository(), new InMemoryApiaryRepository());

        $this->expectException(ApiaryNotFoundException::class);

        $handler(new ListHarvestsByApiaryQuery(Uuid::generate()));
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
