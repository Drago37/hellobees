<?php

declare(strict_types=1);

namespace HelloBeesTest\History\Application\Command\AddTraceComment;

use HelloBees\History\Application\Command\AddTraceComment\AddTraceCommentCommand;
use HelloBees\History\Application\Command\AddTraceComment\AddTraceCommentHandler;
use HelloBees\History\Domain\Enum\TraceAction;
use HelloBees\History\Domain\Enum\TraceOperation;
use HelloBeesTest\History\Double\InMemoryTraceRepository;
use PHPUnit\Framework\TestCase;

final class AddTraceCommentHandlerTest extends TestCase
{
    public function testItPersistsAndReturnsTheTrace(): void
    {
        $repository = new InMemoryTraceRepository();
        $handler = new AddTraceCommentHandler($repository);

        $command = new AddTraceCommentCommand(
            'This hive is doing great',
            'beekeeper-1',
            'beehive-1',
            'apiary-1',
        );

        $trace = $handler($command);

        // The handler returns the created aggregate...
        self::assertSame('This hive is doing great', $trace->getComment());
        self::assertSame(TraceOperation::Create, $trace->getOperation());
        self::assertSame(TraceAction::TraceComment, $trace->getAction());
        self::assertSame('beekeeper-1', $trace->getBeeKeeperId());
        self::assertSame('beehive-1', $trace->getBeehiveId());
        self::assertSame('apiary-1', $trace->getApiaryId());

        // ...and it has been persisted under a generated identity.
        self::assertSame($trace, $repository->find($trace->getUuid()));
    }

    public function testItAcceptsNullableContextIdentifiers(): void
    {
        $repository = new InMemoryTraceRepository();
        $handler = new AddTraceCommentHandler($repository);

        $trace = $handler(new AddTraceCommentCommand('A comment without context', null, null, null));

        self::assertNull($trace->getBeeKeeperId());
        self::assertNull($trace->getBeehiveId());
        self::assertNull($trace->getApiaryId());
    }
}
