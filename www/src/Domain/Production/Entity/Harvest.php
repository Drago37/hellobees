<?php

declare(strict_types=1);

namespace HelloBees\Domain\Production\Entity;

use HelloBees\Domain\BeeKeeping\Aggregate\Apiary;
use HelloBees\Domain\SharedKernel\Entity\Entity;
use HelloBees\Domain\SharedKernel\Enum\HoneyType;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\DateTime;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Class
 *
 * @class Harvest
 * @package HelloBees\Domain\Production\Entity
 */
class Harvest extends Entity
{
    /**
     * Harvest constructor
     *
     * @param Uuid $uuid
     * @param DateTime $created
     * @param DateTime $harvestDate
     * @param HoneyType $honeyType
     * @param int $quantity
     * @param Apiary $apiary
     */
    public function __construct(
        Uuid                $uuid,
        protected DateTime  $created,
        protected DateTime  $harvestDate,
        protected HoneyType $honeyType,
        protected int       $quantity,
        protected Apiary    $apiary
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
     * @return Harvest
     */
    public function setCreated(DateTime $created): Harvest
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getHarvestDate(): DateTime
    {
        return $this->harvestDate;
    }

    /**
     * @param DateTime $harvestDate
     * @return Harvest
     */
    public function setHarvestDate(DateTime $harvestDate): Harvest
    {
        $this->harvestDate = $harvestDate;
        return $this;
    }

    /**
     * @return HoneyType
     */
    public function getHoneyType(): HoneyType
    {
        return $this->honeyType;
    }

    /**
     * @param HoneyType $honeyType
     * @return Harvest
     */
    public function setHoneyType(HoneyType $honeyType): Harvest
    {
        $this->honeyType = $honeyType;
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
     * @return Harvest
     */
    public function setQuantity(int $quantity): Harvest
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return Apiary
     */
    public function getApiary(): Apiary
    {
        return $this->apiary;
    }

    /**
     * @param Apiary $apiary
     * @return Harvest
     */
    public function setApiary(Apiary $apiary): Harvest
    {
        $this->apiary = $apiary;
        return $this;
    }
}