<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Entity;

use HelloBees\BeeKeeping\Domain\Enum\TaskStatus;
use HelloBees\SharedKernel\Domain\Enum\Priority;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

class Task extends \HelloBees\SharedKernel\Domain\Entity\Entity
{
    public function __construct(
        Uuid                 $uuid,
        protected string     $title,
        protected string     $description,
        protected DateTime   $created,
        protected DateTime   $plannedDate,
        protected Beehive    $beehive,
        protected BeeKeeper  $actor,
        protected TaskStatus $taskStatus,
        protected Priority   $priority,
        protected ?DateTime  $finishedDate = null
    )
    {
        parent::__construct($uuid);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Task
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Task
    {
        $this->description = $description;
        return $this;
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): Task
    {
        $this->created = $created;
        return $this;
    }

    public function getFinishedDate(): ?DateTime
    {
        return $this->finishedDate;
    }

    public function setFinishedDate(?DateTime $finishedDate): Task
    {
        $this->finishedDate = $finishedDate;
        return $this;
    }

    public function getPlannedDate(): DateTime
    {
        return $this->plannedDate;
    }

    public function setPlannedDate(DateTime $plannedDate): Task
    {
        $this->plannedDate = $plannedDate;
        return $this;
    }

    public function getBeehive(): Beehive
    {
        return $this->beehive;
    }

    public function setBeehive(Beehive $beehive): Task
    {
        $this->beehive = $beehive;
        return $this;
    }

    public function getActor(): BeeKeeper
    {
        return $this->actor;
    }

    public function setActor(BeeKeeper $actor): Task
    {
        $this->actor = $actor;
        return $this;
    }

    public function getTaskStatus(): TaskStatus
    {
        return $this->taskStatus;
    }

    public function setTaskStatus(TaskStatus $taskStatus): Task
    {
        $this->taskStatus = $taskStatus;
        return $this;
    }

    public function getPriority(): Priority
    {
        return $this->priority;
    }

    public function setPriority(Priority $priority): Task
    {
        $this->priority = $priority;
        return $this;
    }

}