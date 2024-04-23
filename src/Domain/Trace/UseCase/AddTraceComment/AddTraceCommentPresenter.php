<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\AddTraceComment;

/**
 * Interface
 *
 * @class AddTraceCommentPresenter
 * @package HelloBees\Domain\Trace\UseCase\AddTraceComment
 */
interface AddTraceCommentPresenter
{
    /**
     * @param AddTraceCommentResponse $response
     * @return void
     */
    public function present(AddTraceCommentResponse $response): void;
}