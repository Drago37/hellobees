<?php

declare(strict_types=1);

namespace HelloBeesTest\History\Application\Query\ListTraces;

use HelloBees\History\Application\Query\ListTraces\ListTracesHandler;
use HelloBees\History\Application\Query\ListTraces\ListTracesQuery;
use HelloBees\History\Application\Query\ShowTrace\TraceView;
use HelloBees\History\Domain\Entity\Trace;
use HelloBees\History\Domain\Enum\TraceAction;
use HelloBees\History\Domain\Enum\TraceOperation;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBeesTest\History\Double\InMemoryTraceRepository;
use PHPUnit\Framework\TestCase;

final class ListTracesHandlerTest extends TestCase
{
    public function testItReturnsAnEmptyListWhenThereIsNoTrace(): void
    {
        $handler = new ListTracesHandler(new InMemoryTraceRepository());

        self::assertSame([], $handler(new ListTracesQuery()));
    }

    public function testItReturnsOneReadModelPerTrace(): void
    {
        $repository = new InMemoryTraceRepository();
        foreach (['first comment', 'second comment'] as $comment) {
            $repository->insert(new Trace(
                Uuid::generate(),
                DateTime::now(),
                TraceOperation::Create,
                TraceAction::TraceComment,
                $comment,
                'beekeeper-1',
                'beehive-1',
                'apiary-1',
            ));
        }

        $views = (new ListTracesHandler($repository))(new ListTracesQuery());

        self::assertCount(2, $views);
        self::assertContainsOnlyInstancesOf(TraceView::class, $views);
        self::assertEqualsCanonicalizing(
            ['first comment', 'second comment'],
            array_map(static fn (TraceView $view): string => $view->comment, $views),
        );
    }

    public function testItFiltersByBeeKeeperId(): void
    {
        $repository = new InMemoryTraceRepository();
        $repository->insert(new Trace(
            Uuid::generate(),
            DateTime::now(),
            TraceOperation::Create,
            TraceAction::TraceComment,
            'matching trace',
            'beekeeper-1',
            null,
            null,
        ));
        $repository->insert(new Trace(
            Uuid::generate(),
            DateTime::now(),
            TraceOperation::Create,
            TraceAction::TraceComment,
            'other trace',
            'beekeeper-2',
            null,
            null,
        ));

        $views = (new ListTracesHandler($repository))(new ListTracesQuery(beeKeeperId: 'beekeeper-1'));

        self::assertCount(1, $views);
        self::assertSame('matching trace', $views[0]->comment);
    }

    public function testItFiltersByBeehiveId(): void
    {
        $repository = new InMemoryTraceRepository();
        $repository->insert(new Trace(
            Uuid::generate(),
            DateTime::now(),
            TraceOperation::Create,
            TraceAction::TraceComment,
            'matching trace',
            null,
            'beehive-1',
            null,
        ));
        $repository->insert(new Trace(
            Uuid::generate(),
            DateTime::now(),
            TraceOperation::Create,
            TraceAction::TraceComment,
            'other trace',
            null,
            'beehive-2',
            null,
        ));

        $views = (new ListTracesHandler($repository))(new ListTracesQuery(beehiveId: 'beehive-1'));

        self::assertCount(1, $views);
        self::assertSame('matching trace', $views[0]->comment);
    }

    public function testItFiltersByApiaryId(): void
    {
        $repository = new InMemoryTraceRepository();
        $repository->insert(new Trace(
            Uuid::generate(),
            DateTime::now(),
            TraceOperation::Create,
            TraceAction::TraceComment,
            'matching trace',
            null,
            null,
            'apiary-1',
        ));
        $repository->insert(new Trace(
            Uuid::generate(),
            DateTime::now(),
            TraceOperation::Create,
            TraceAction::TraceComment,
            'other trace',
            null,
            null,
            'apiary-2',
        ));

        $views = (new ListTracesHandler($repository))(new ListTracesQuery(apiaryId: 'apiary-1'));

        self::assertCount(1, $views);
        self::assertSame('matching trace', $views[0]->comment);
    }
}
