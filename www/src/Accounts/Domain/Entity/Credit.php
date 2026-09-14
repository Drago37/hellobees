<?php

declare(strict_types=1);

namespace HelloBees\Accounts\Domain\Entity;

use HelloBees\Sales\Domain\Entity\Command;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

class Credit extends \HelloBees\SharedKernel\Domain\Entity\Entity
{
    public function __construct(
        Uuid               $uuid,
        protected DateTime $created,
        protected string   $title,
        protected int      $total,
        protected ?\HelloBees\Sales\Domain\Entity\Command $command = null
    )
    {
        parent::__construct($uuid);
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): Credit
    {
        $this->created = $created;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Credit
    {
        $this->title = $title;
        return $this;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): Credit
    {
        $this->total = $total;
        return $this;
    }

    public function getCommand(): ?Command
    {
        return $this->command;
    }

    public function setCommand(?\HelloBees\Sales\Domain\Entity\Command $command): Credit
    {
        $this->command = $command;
        return $this;
    }
}