<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Entity;

use HelloBees\BeeKeeping\Domain\Enum\FeedingType;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

class Feeding extends \HelloBees\SharedKernel\Domain\Entity\Entity
{
    public function __construct(
        Uuid                  $uuid,
        protected DateTime    $created,
        protected DateTime    $feedingDate,
        protected FeedingType $feedingType,
        protected int         $quantity,
        protected Beehive     $beehive,
        protected BeeKeeper   $actor
    )
    {
        parent::__construct($uuid);
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): Feeding
    {
        $this->created = $created;
        return $this;
    }

    public function getFeedingDate(): DateTime
    {
        return $this->feedingDate;
    }

    public function setFeedingDate(DateTime $feedingDate): Feeding
    {
        $this->feedingDate = $feedingDate;
        return $this;
    }

    public function getFeedingType(): FeedingType
    {
        return $this->feedingType;
    }

    public function setFeedingType(FeedingType $feedingType): Feeding
    {
        $this->feedingType = $feedingType;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): Feeding
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getBeehive(): Beehive
    {
        return $this->beehive;
    }

    public function setBeehive(Beehive $beehive): Feeding
    {
        $this->beehive = $beehive;
        return $this;
    }

    public function getActor(): BeeKeeper
    {
        return $this->actor;
    }

    public function setActor(BeeKeeper $actor): Feeding
    {
        $this->actor = $actor;
        return $this;
    }
}