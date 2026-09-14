<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Entity;

use HelloBees\BeeKeeping\Domain\Enum\FeedingType;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

/**
 * Class
 *
 * @class Feeding
 * @package HelloBees\Domain\BeeKeeping\Entity
 */
class Feeding extends \HelloBees\SharedKernel\Domain\Entity\Entity
{
    /**
     * Feeding constructor
     *
     * @param Uuid $uuid
     * @param DateTime $created
     * @param DateTime $feedingDate
     * @param \HelloBees\BeeKeeping\Domain\Enum\FeedingType $feedingType
     * @param int $quantity
     * @param Beehive $beehive
     * @param BeeKeeper $actor
     */
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

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     * @return Feeding
     */
    public function setCreated(DateTime $created): Feeding
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getFeedingDate(): DateTime
    {
        return $this->feedingDate;
    }

    /**
     * @param DateTime $feedingDate
     * @return Feeding
     */
    public function setFeedingDate(DateTime $feedingDate): Feeding
    {
        $this->feedingDate = $feedingDate;
        return $this;
    }

    /**
     * @return \HelloBees\BeeKeeping\Domain\Enum\FeedingType
     */
    public function getFeedingType(): FeedingType
    {
        return $this->feedingType;
    }

    /**
     * @param FeedingType $feedingType
     * @return Feeding
     */
    public function setFeedingType(FeedingType $feedingType): Feeding
    {
        $this->feedingType = $feedingType;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return Feeding
     */
    public function setQuantity(int $quantity): Feeding
    {
        $this->quantity = $quantity;
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
     * @return Feeding
     */
    public function setBeehive(Beehive $beehive): Feeding
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
     * @return Feeding
     */
    public function setActor(BeeKeeper $actor): Feeding
    {
        $this->actor = $actor;
        return $this;
    }
}