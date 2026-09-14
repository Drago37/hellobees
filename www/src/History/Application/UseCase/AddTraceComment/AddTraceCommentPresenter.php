<?php

declare(strict_types=1);

namespace HelloBees\History\Application\UseCase\AddTraceComment;

interface AddTraceCommentPresenter
{
    public function present(AddTraceCommentResponse $response): void;
}