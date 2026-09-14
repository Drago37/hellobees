<?php

declare(strict_types=1);

namespace HelloBees\History\Domain\Entity;

use HelloBees\History\Domain\Enum\TraceAction;
use HelloBees\History\Domain\Enum\TraceOperation;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

class Trace extends \HelloBees\SharedKernel\Domain\Entity\Entity
{
    public function __construct(
        Uuid                     $uuid,
        protected DateTime       $created,
        protected TraceOperation $operation,
        protected TraceAction    $action,
        protected string         $comment,
        protected ?string        $beeKeeperId,
        protected ?string        $beehiveId,
        protected ?string        $ApiaryId
    )
    {
        parent::__construct($uuid);
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): Trace
    {
        $this->created = $created;
        return $this;
    }

    public function getOperation(): TraceOperation
    {
        return $this->operation;
    }

    public function setOperation(TraceOperation $operation): Trace
    {
        $this->operation = $operation;
        return $this;
    }

    public function getAction(): TraceAction
    {
        return $this->action;
    }

    public function setAction(TraceAction $action): Trace
    {
        $this->action = $action;
        return $this;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): Trace
    {
        $this->comment = $comment;
        return $this;
    }

    public function getBeeKeeperId(): ?string
    {
        return $this->beeKeeperId;
    }

    public function setBeeKeeperId(?string $beeKeeperId): Trace
    {
        $this->beeKeeperId = $beeKeeperId;
        return $this;
    }

    public function getBeehiveId(): ?string
    {
        return $this->beehiveId;
    }

    public function setBeehiveId(?string $beehiveId): Trace
    {
        $this->beehiveId = $beehiveId;
        return $this;
    }

    public function getApiaryId(): ?string
    {
        return $this->ApiaryId;
    }

    public function setApiaryId(?string $ApiaryId): Trace
    {
        $this->ApiaryId = $ApiaryId;
        return $this;
    }

}