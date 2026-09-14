<?php

declare(strict_types=1);

namespace HelloBeesTest\Production\Application\Query\ListHarvests;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\BeeKeeping\Domain\Collection\BeehiveCollection;
use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\BeeKeeping\Domain\Enum\ApiaryEnvironment;
use HelloBees\BeeKeeping\Domain\Enum\BeeKeeperType;
use HelloBees\BeeKeeping\Domain\ValueObject\NapiNumber;
use HelloBees\Production\Application\Query\ListHarvests\ListHarvestsHandler;
use HelloBees\Production\Application\Query\ListHarvests\ListHarvestsQuery;
use HelloBees\Production\Application\Query\ShowHarvest\HarvestView;
use HelloBees\Production\Domain\Entity\Harvest;
use HelloBees\SharedKernel\Domain\Enum\HoneyType;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBees\SharedKernel\Domain\ValueObject\Map\Coordinates;
use HelloBeesTest\Production\Double\InMemoryHarvestRepository;
use PHPUnit\Framework\TestCase;

final class ListHarvestsHandlerTest extends TestCase
{
    public function testItReturnsAnEmptyListWhenThereIsNoHarvest(): void
    {
        $handler = new ListHarvestsHandler(new InMemoryHarvestRepository());

        self::assertSame([], $handler(new ListHarvestsQuery()));
    }

    public function testItReturnsOneReadModelPerHarvest(): void
    {
        $repository = new InMemoryHarvestRepository();
        $apiary = $this->createApiary();

        foreach ([10, 20] as $quantity) {
            $repository->insert(new Harvest(
                Uuid::generate(),
                DateTime::now(),
                DateTime::now(),
                HoneyType::Acacia,
                $quantity,
                $apiary,
            ));
        }

        $views = (new ListHarvestsHandler($repository))(new ListHarvestsQuery());

        self::assertCount(2, $views);
        self::assertContainsOnlyInstancesOf(HarvestView::class, $views);
        self::assertEqualsCanonicalizing(
            [10, 20],
            array_map(static fn (HarvestView $view): int => $view->quantity, $views),
        );
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
