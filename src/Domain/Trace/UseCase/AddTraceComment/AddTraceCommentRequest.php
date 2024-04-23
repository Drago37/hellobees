<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\AddTraceComment;

use HelloBees\Domain\BeeKeeping\Entity\BeeKeeper;

/**
 * Class
 *
 * @class AddTraceCommentRequest
 * @package HelloBees\Domain\Trace\UseCase\AddTraceComment
 */
class AddTraceCommentRequest
{
    /**
     * AddTraceCommentRequest constructor
     *
     * @param BeeKeeper $beeKeeper
     * @param string $comment
     */
    public function __construct(
        private BeeKeeper $beeKeeper,
        private string    $comment
    )
    {
    }

    /**
     * @return BeeKeeper
     */
    public function getBeeKeeper(): BeeKeeper
    {
        return $this->beeKeeper;
    }

    /**
     * @param BeeKeeper $beeKeeper
     * @return AddTraceCommentRequest
     */
    public function setBeeKeeper(BeeKeeper $beeKeeper): AddTraceCommentRequest
    {
        $this->beeKeeper = $beeKeeper;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return AddTraceCommentRequest
     */
    public function setComment(string $comment): AddTraceCommentRequest
    {
        $this->comment = $comment;
        return $this;
    }

}