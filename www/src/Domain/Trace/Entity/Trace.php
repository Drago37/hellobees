<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\Entity;

use HelloBees\Domain\SharedKernel\Entity\Entity;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\DateTime;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;
use HelloBees\Domain\Trace\Enum\TraceAction;
use HelloBees\Domain\Trace\Enum\TraceOperation;

/**
 * Class
 *
 * @class Trace
 * @package HelloBees\Domain\Trace\Entity
 */
class Trace extends Entity
{
    /**
     * Trace constructor
     *
     * @param Uuid $uuid
     * @param DateTime $created
     * @param TraceOperation $operation
     * @param TraceAction $action
     * @param string $comment
     * @param string|null $beeKeeperId
     * @param string|null $beehiveId
     * @param string|null $ApiaryId
     */
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

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     * @return Trace
     */
    public function setCreated(DateTime $created): Trace
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return TraceOperation
     */
    public function getOperation(): TraceOperation
    {
        return $this->operation;
    }

    /**
     * @param TraceOperation $operation
     * @return Trace
     */
    public function setOperation(TraceOperation $operation): Trace
    {
        $this->operation = $operation;
        return $this;
    }

    /**
     * @return TraceAction
     */
    public function getAction(): TraceAction
    {
        return $this->action;
    }

    /**
     * @param TraceAction $action
     * @return Trace
     */
    public function setAction(TraceAction $action): Trace
    {
        $this->action = $action;
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
     * @return Trace
     */
    public function setComment(string $comment): Trace
    {
        $this->comment = $comment;
        return $this;
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
     * @return Trace
     */
    public function setBeeKeeperId(?string $beeKeeperId): Trace
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
     * @return Trace
     */
    public function setBeehiveId(?string $beehiveId): Trace
    {
        $this->beehiveId = $beehiveId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApiaryId(): ?string
    {
        return $this->ApiaryId;
    }

    /**
     * @param string|null $ApiaryId
     * @return Trace
     */
    public function setApiaryId(?string $ApiaryId): Trace
    {
        $this->ApiaryId = $ApiaryId;
        return $this;
    }

}