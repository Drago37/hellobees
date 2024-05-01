<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\UseCase\AddTraceComment;

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
     * @param string|null $beeKeeperId
     * @param string|null $beehiveId
     * @param string|null $apiaryId
     * @param string $comment
     */
    public function __construct(
        private ?string $beeKeeperId,
        private ?string $beehiveId,
        private ?string $apiaryId,
        private string  $comment
    )
    {
    }

    /**
     * @return string|null
     */
    public function getBeeKeeperId(): ?string
    {
        return $this->beeKeeperId;
    }

    /**
     * @param string|null $beeKeeperId
     * @return AddTraceCommentRequest
     */
    public function setBeeKeeperId(?string $beeKeeperId): AddTraceCommentRequest
    {
        $this->beeKeeperId = $beeKeeperId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBeehiveId(): ?string
    {
        return $this->beehiveId;
    }

    /**
     * @param string|null $beehiveId
     * @return AddTraceCommentRequest
     */
    public function setBeehiveId(?string $beehiveId): AddTraceCommentRequest
    {
        $this->beehiveId = $beehiveId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApiaryId(): ?string
    {
        return $this->apiaryId;
    }

    /**
     * @param string|null $apiaryId
     * @return AddTraceCommentRequest
     */
    public function setApiaryId(?string $apiaryId): AddTraceCommentRequest
    {
        $this->apiaryId = $apiaryId;
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