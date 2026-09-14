<?php

declare(strict_types=1);

namespace HelloBees\History\Application\Command\AddTraceComment;

final readonly class AddTraceCommentCommand
{
    public function __construct(
        public string $comment,
        public ?string $beeKeeperId,
        public ?string $beehiveId,
        public ?string $apiaryId,
    ) {
    }
}
