<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Entity;

use HelloBees\Domain\BeeKeeping\Enum\TaskStatus;
use HelloBees\Domain\SharedKernel\Entity\Entity;
use HelloBees\Domain\SharedKernel\Enum\Priority;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\DateTime;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Class
 *
 * @class Task
 * @package HelloBees\Domain\BeeKeeping\Entity
 */
class Task extends Entity
{
    /**
     * Task constructor
     *
     * @param Uuid $uuid
     * @param string $title
     * @param string $description
     * @param DateTime $created
     * @param DateTime|null $finishedDate
     * @param DateTime $plannedDate
     * @param Beehive $beehive
     * @param BeeKeeper $actor
     * @param TaskStatus $taskStatus
     * @param Priority $priority
     */
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

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): Task
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): Task
    {
        $this->description = $description;
        return $this;
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
     * @return $this
     */
    public function setCreated(DateTime $created): Task
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getFinishedDate(): ?DateTime
    {
        return $this->finishedDate;
    }

    /**
     * @param DateTime|null $finishedDate
     * @return $this
     */
    public function setFinishedDate(?DateTime $finishedDate): Task
    {
        $this->finishedDate = $finishedDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getPlannedDate(): DateTime
    {
        return $this->plannedDate;
    }

    /**
     * @param DateTime $plannedDate
     * @return $this
     */
    public function setPlannedDate(DateTime $plannedDate): Task
    {
        $this->plannedDate = $plannedDate;
        return $this;
    }

    /**
     * @return Beehive
     */
    public function getBeehive(): Beehive
    {
        return $this->beehive;
    }

    /**
     * @param Beehive $beehive
     * @return $this
     */
    public function setBeehive(Beehive $beehive): Task
    {
        $this->beehive = $beehive;
        return $this;
    }

    /**
     * @return BeeKeeper
     */
    public function getActor(): BeeKeeper
    {
        return $this->actor;
    }

    /**
     * @param BeeKeeper $actor
     * @return $this
     */
    public function setActor(BeeKeeper $actor): Task
    {
        $this->actor = $actor;
        return $this;
    }

    /**
     * @return TaskStatus
     */
    public function getTaskStatus(): TaskStatus
    {
        return $this->taskStatus;
    }

    /**
     * @param TaskStatus $taskStatus
     * @return $this
     */
    public function setTaskStatus(TaskStatus $taskStatus): Task
    {
        $this->taskStatus = $taskStatus;
        return $this;
    }

    /**
     * @return Priority
     */
    public function getPriority(): Priority
    {
        return $this->priority;
    }

    /**
     * @param Priority $priority
     * @return $this
     */
    public function setPriority(Priority $priority): Task
    {
        $this->priority = $priority;
        return $this;
    }

}