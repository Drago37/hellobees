<?php

declare(strict_types=1);

namespace HelloBees\History\Application\Query\ShowTrace;

use HelloBees\History\Domain\Entity\Trace;

final readonly class TraceView
{
    public function __construct(
        public string $uuid,
        public string $created,
        public string $operation,
        public string $action,
        public string $comment,
        public ?string $beeKeeperId,
        public ?string $beehiveId,
        public ?string $apiaryId,
    ) {
    }

    public static function fromEntity(Trace $trace): self
    {
        return new self(
            (string) $trace->getUuid(),
            $trace->getCreated()->toString(),
            $trace->getOperation()->value,
            $trace->getAction()->value,
            $trace->getComment(),
            $trace->getBeeKeeperId(),
            $trace->getBeehiveId(),
            $trace->getApiaryId(),
        );
    }
}
