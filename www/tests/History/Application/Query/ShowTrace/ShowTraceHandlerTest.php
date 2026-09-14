<?php

declare(strict_types=1);

namespace HelloBeesTest\History\Application\Query\ShowTrace;

use HelloBees\History\Application\Query\ShowTrace\ShowTraceHandler;
use HelloBees\History\Application\Query\ShowTrace\ShowTraceQuery;
use HelloBees\History\Application\Query\ShowTrace\TraceView;
use HelloBees\History\Domain\Entity\Trace;
use HelloBees\History\Domain\Enum\TraceAction;
use HelloBees\History\Domain\Enum\TraceOperation;
use HelloBees\History\Domain\Exception\TraceNotFoundException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBeesTest\History\Double\InMemoryTraceRepository;
use PHPUnit\Framework\TestCase;

final class ShowTraceHandlerTest extends TestCase
{
    public function testItReturnsAReadModelForAnExistingTrace(): void
    {
        $repository = new InMemoryTraceRepository();
        $uuid = Uuid::generate();
        $repository->insert(new Trace(
            $uuid,
            DateTime::now(),
            TraceOperation::Create,
            TraceAction::TraceComment,
            'This hive is doing great',
            'beekeeper-1',
            'beehive-1',
            'apiary-1',
        ));

        $view = (new ShowTraceHandler($repository))(new ShowTraceQuery($uuid));

        self::assertInstanceOf(TraceView::class, $view);
        self::assertSame((string) $uuid, $view->uuid);
        self::assertSame('This hive is doing great', $view->comment);
        self::assertSame('create', $view->operation);
        self::assertSame('trace_comment', $view->action);
        self::assertSame('beekeeper-1', $view->beeKeeperId);
        self::assertSame('beehive-1', $view->beehiveId);
        self::assertSame('apiary-1', $view->apiaryId);
    }

    public function testItThrowsWhenTheTraceDoesNotExist(): void
    {
        $handler = new ShowTraceHandler(new InMemoryTraceRepository());

        $this->expectException(TraceNotFoundException::class);

        $handler(new ShowTraceQuery(Uuid::generate()));
    }
}
