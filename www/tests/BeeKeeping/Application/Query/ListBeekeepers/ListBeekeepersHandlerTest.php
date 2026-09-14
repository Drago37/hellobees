<?php

declare(strict_types=1);

namespace HelloBeesTest\BeeKeeping\Application\Query\ListBeekeepers;

use HelloBees\BeeKeeping\Application\Query\ListBeekeepers\ListBeekeepersHandler;
use HelloBees\BeeKeeping\Application\Query\ListBeekeepers\ListBeekeepersQuery;
use HelloBees\BeeKeeping\Application\Query\ShowBeekeeper\BeekeeperView;
use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\BeeKeeping\Domain\Enum\BeeKeeperType;
use HelloBees\BeeKeeping\Domain\ValueObject\NapiNumber;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBeesTest\BeeKeeping\Double\InMemoryBeekeeperRepository;
use PHPUnit\Framework\TestCase;

final class ListBeekeepersHandlerTest extends TestCase
{
    public function testItReturnsAnEmptyListWhenThereIsNoBeekeeper(): void
    {
        $handler = new ListBeekeepersHandler(new InMemoryBeekeeperRepository());

        self::assertSame([], $handler(new ListBeekeepersQuery()));
    }

    public function testItReturnsOneReadModelPerBeekeeper(): void
    {
        $repository = new InMemoryBeekeeperRepository();
        foreach (['12345678', 'A1234567'] as $napi) {
            $repository->insert(new BeeKeeper(
                Uuid::generate(),
                new NapiNumber($napi),
                new Username('Anthony', 'Graule'),
                new Email('anthony.graule@gmail.com'),
                BeeKeeperType::Amateur,
                DateTime::now(),
            ));
        }

        $views = (new ListBeekeepersHandler($repository))(new ListBeekeepersQuery());

        self::assertCount(2, $views);
        self::assertContainsOnlyInstancesOf(BeekeeperView::class, $views);
        self::assertEqualsCanonicalizing(
            ['12345678', 'A1234567'],
            array_map(static fn (BeekeeperView $view): string => $view->napiNumber, $views),
        );
    }
}
