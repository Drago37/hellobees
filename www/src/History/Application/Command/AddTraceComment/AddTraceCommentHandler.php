<?php

declare(strict_types=1);

namespace HelloBees\History\Application\Command\AddTraceComment;

use HelloBees\History\Domain\Entity\Trace;
use HelloBees\History\Domain\Enum\TraceAction;
use HelloBees\History\Domain\Enum\TraceOperation;
use HelloBees\History\Domain\Repository\TraceRepository;
use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\Exception\RepositoryException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

final readonly class AddTraceCommentHandler
{
    public function __construct(
        private TraceRepository $traceRepository,
    ) {
    }

    /**
     * @throws InvalidValueObjectException
     * @throws RepositoryException
     */
    public function __invoke(AddTraceCommentCommand $command): Trace
    {
        $trace = new Trace(
            Uuid::generate(),
            DateTime::now(),
            TraceOperation::Create,
            TraceAction::TraceComment,
            $command->comment,
            $command->beeKeeperId,
            $command->beehiveId,
            $command->apiaryId,
        );

        $this->traceRepository->insert($trace);

        return $trace;
    }
}
