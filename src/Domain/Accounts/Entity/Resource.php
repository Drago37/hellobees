<?php

declare(strict_types=1);

namespace HelloBees\Domain\Accounts\Entity;

use HelloBees\Domain\Selling\Entity\Command;
use HelloBees\Domain\SharedKernel\Entity\Entity;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\DateTime;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Class
 *
 * @class Resource
 * @package HelloBees\Domain\Accounts\Entity
 */
class Resource extends Entity
{
    /**
     * Resource constructor
     *
     * @param Uuid $uuid
     * @param DateTime $created
     * @param string $title
     * @param int $total
     * @param Command|null $command
     */
    public function __construct(
        Uuid               $uuid,
        protected DateTime $created,
        protected string   $title,
        protected int      $total,
        protected ?Command $command = null
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
     * @return Resource
     */
    public function setCreated(DateTime $created): Resource
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Resource
     */
    public function setTitle(string $title): Resource
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     * @return Resource
     */
    public function setTotal(int $total): Resource
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return Command|null
     */
    public function getCommand(): ?Command
    {
        return $this->command;
    }

    /**
     * @param Command|null $command
     * @return Resource
     */
    public function setCommand(?Command $command): Resource
    {
        $this->command = $command;
        return $this;
    }
}