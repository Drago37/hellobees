<?php

declare(strict_types=1);

namespace HelloBees\Accounts\Domain\Entity;

use HelloBees\SharedKernel\Domain\Entity\Entity;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

class Expense extends Entity
{
    public function __construct(
        Uuid               $uuid,
        protected DateTime $created,
        protected string   $comment,
        protected int      $cost
    )
    {
        parent::__construct($uuid);
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): Expense
    {
        $this->created = $created;
        return $this;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): Expense
    {
        $this->comment = $comment;
        return $this;
    }

    public function getCost(): int
    {
        return $this->cost;
    }

    public function setCost(int $cost): Expense
    {
        $this->cost = $cost;
        return $this;
    }
}