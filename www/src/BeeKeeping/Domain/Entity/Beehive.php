<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Entity;

use HelloBees\BeeKeeping\Domain\Collection\FeedingCollection;
use HelloBees\BeeKeeping\Domain\Collection\TaskCollection;
use HelloBees\BeeKeeping\Domain\Collection\VisitCollection;
use HelloBees\BeeKeeping\Domain\Enum\BeehiveType;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

class Beehive extends \HelloBees\SharedKernel\Domain\Entity\Entity
{
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

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): Beehive
    {
        $this->number = $number;
        return $this;
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): Beehive
    {
        $this->created = $created;
        return $this;
    }

    public function getBeehiveType(): BeehiveType
    {
        return $this->beehiveType;
    }

    public function setBeehiveType(BeehiveType $beehiveType): Beehive
    {
        $this->beehiveType = $beehiveType;
        return $this;
    }

    public function isEmpty(): bool
    {
        return $this->empty;
    }

    public function setEmpty(bool $empty): Beehive
    {
        $this->empty = $empty;
        return $this;
    }

    public function getVisitCollection(): ?VisitCollection
    {
        return $this->visitCollection;
    }

    public function setVisitCollection(?VisitCollection $visitCollection): Beehive
    {
        $this->visitCollection = $visitCollection;
        return $this;
    }

    public function getFeedingCollection(): ?FeedingCollection
    {
        return $this->feedingCollection;
    }

    public function setFeedingCollection(?FeedingCollection $feedingCollection): Beehive
    {
        $this->feedingCollection = $feedingCollection;
        return $this;
    }

    public function getTaskCollection(): ?TaskCollection
    {
        return $this->taskCollection;
    }

    public function setTaskCollection(?TaskCollection $taskCollection): Beehive
    {
        $this->taskCollection = $taskCollection;
        return $this;
    }

}