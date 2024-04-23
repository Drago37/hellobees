<?php

declare(strict_types=1);

namespace HelloBees\Domain\Trace\Entity;

use HelloBees\Domain\BeeKeeping\Entity\BeeKeeper;
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
     * @param BeeKeeper $beeKeeper
     */
    public function __construct(
        Uuid                     $uuid,
        protected DateTime       $created,
        protected TraceOperation $operation,
        protected TraceAction    $action,
        protected string         $comment,
        protected BeeKeeper      $beeKeeper
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
     * @return BeeKeeper
     */
    public function getBeeKeeper(): BeeKeeper
    {
        return $this->beeKeeper;
    }

    /**
     * @param BeeKeeper $beeKeeper
     * @return Trace
     */
    public function setBeeKeeper(BeeKeeper $beeKeeper): Trace
    {
        $this->beeKeeper = $beeKeeper;
        return $this;
    }
}