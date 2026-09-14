<?php

declare(strict_types=1);

namespace HelloBees\History\Application\UseCase\AddTraceComment;

class AddTraceCommentRequest
{
    public function __construct(
        private ?string $beeKeeperId,
        private ?string $beehiveId,
        private ?string $apiaryId,
        private string  $comment
    )
    {
    }

    public function getBeeKeeperId(): ?string
    {
        return $this->beeKeeperId;
    }

    public function setBeeKeeperId(?string $beeKeeperId): AddTraceCommentRequest
    {
        $this->beeKeeperId = $beeKeeperId;
        return $this;
    }

    public function getBeehiveId(): ?string
    {
        return $this->beehiveId;
    }

    public function setBeehiveId(?string $beehiveId): AddTraceCommentRequest
    {
        $this->beehiveId = $beehiveId;
        return $this;
    }

    public function getApiaryId(): ?string
    {
        return $this->apiaryId;
    }

    public function setApiaryId(?string $apiaryId): AddTraceCommentRequest
    {
        $this->apiaryId = $apiaryId;
        return $this;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): AddTraceCommentRequest
    {
        $this->comment = $comment;
        return $this;
    }

}