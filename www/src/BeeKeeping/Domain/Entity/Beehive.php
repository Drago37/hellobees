<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Entity;

use HelloBees\BeeKeeping\Domain\Collection\FeedingCollection;
use HelloBees\BeeKeeping\Domain\Collection\TaskCollection;
use HelloBees\BeeKeeping\Domain\Collection\VisitCollection;
use HelloBees\BeeKeeping\Domain\Enum\BeehiveType;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

/**
 * Class
 * @class Beehive
 * @package HelloBees\Domain\BeeKeeping\Entity
 */
class Beehive extends \HelloBees\SharedKernel\Domain\Entity\Entity
{
    /**
     * Beehive constructor
     *
     * @param Uuid $uuid
     * @param int $number
     * @param \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime $created
     * @param \HelloBees\BeeKeeping\Domain\Enum\BeehiveType $beehiveType
     * @param \HelloBees\BeeKeeping\Domain\Collection\VisitCollection|null $visitCollection
     * @param FeedingCollection|null $feedingCollection
     * @param TaskCollection|null $taskCollection
     * @param bool $empty
     */
    public function __construct(
        Uuid                         $uuid,
        protected int                $number,
        protected DateTime           $created,
        protected BeehiveType        $beehiveType,
        protected ?VisitCollection   $visitCollection = null,
        protected ?FeedingCollection $feedingCollection = null,
        protected ?TaskCollection    $taskCollection = null,
        protected bool               $empty = false
    )
    {
        parent::__construct($uuid);
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return $this
     */
    public function setNumber(int $number): Beehive
    {
        $this->number = $number;
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
    public function setCreated(DateTime $created): Beehive
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return \HelloBees\BeeKeeping\Domain\Enum\BeehiveType
     */
    public function getBeehiveType(): BeehiveType
    {
        return $this->beehiveType;
    }

    /**
     * @param \HelloBees\BeeKeeping\Domain\Enum\BeehiveType $beehiveType
     *
     * @return $this
     */
    public function setBeehiveType(BeehiveType $beehiveType): Beehive
    {
        $this->beehiveType = $beehiveType;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->empty;
    }

    /**
     * @param bool $empty
     * @return $this
     */
    public function setEmpty(bool $empty): Beehive
    {
        $this->empty = $empty;
        return $this;
    }

    /**
     * @return VisitCollection|null
     */
    public function getVisitCollection(): ?VisitCollection
    {
        return $this->visitCollection;
    }

    /**
     * @param \HelloBees\BeeKeeping\Domain\Collection\VisitCollection|null $visitCollection
     *
     * @return Beehive
     */
    public function setVisitCollection(?VisitCollection $visitCollection): Beehive
    {
        $this->visitCollection = $visitCollection;
        return $this;
    }

    /**
     * @return FeedingCollection|null
     */
    public function getFeedingCollection(): ?FeedingCollection
    {
        return $this->feedingCollection;
    }

    /**
     * @param FeedingCollection|null $feedingCollection
     * @return Beehive
     */
    public function setFeedingCollection(?FeedingCollection $feedingCollection): Beehive
    {
        $this->feedingCollection = $feedingCollection;
        return $this;
    }

    /**
     * @return TaskCollection|null
     */
    public function getTaskCollection(): ?TaskCollection
    {
        return $this->taskCollection;
    }

    /**
     * @param \HelloBees\BeeKeeping\Domain\Collection\TaskCollection|null $taskCollection
     *
     * @return Beehive
     */
    public function setTaskCollection(?TaskCollection $taskCollection): Beehive
    {
        $this->taskCollection = $taskCollection;
        return $this;
    }

}