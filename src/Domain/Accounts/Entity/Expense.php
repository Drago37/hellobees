<?php

declare(strict_types=1);

namespace HelloBees\Domain\Accounts\Entity;

use HelloBees\Domain\SharedKernel\Entity\Entity;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\DateTime;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Class
 *
 * @class Expense
 * @package HelloBees\Domain\Accounts\Entity
 */
class Expense extends Entity
{
    /**
     * Expense constructor
     *
     * @param Uuid $uuid
     * @param DateTime $created
     * @param string $comment
     * @param int $cost
     */
    public function __construct(
        Uuid               $uuid,
        protected DateTime $created,
        protected string   $comment,
        protected int      $cost
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
     * @return Expense
     */
    public function setCreated(DateTime $created): Expense
    {
        $this->created = $created;
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
     * @return Expense
     */
    public function setComment(string $comment): Expense
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return $this->cost;
    }

    /**
     * @param int $cost
     * @return Expense
     */
    public function setCost(int $cost): Expense
    {
        $this->cost = $cost;
        return $this;
    }
}