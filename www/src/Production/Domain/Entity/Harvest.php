<?php

declare(strict_types=1);

namespace HelloBees\Production\Domain\Entity;

use HelloBees\BeeKeeping\Domain\Aggregate\Apiary;
use HelloBees\SharedKernel\Domain\Entity\Entity;
use HelloBees\SharedKernel\Domain\Enum\HoneyType;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

class Harvest extends Entity
{
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

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): Harvest
    {
        $this->created = $created;
        return $this;
    }

    public function getHarvestDate(): DateTime
    {
        return $this->harvestDate;
    }

    public function setHarvestDate(DateTime $harvestDate): Harvest
    {
        $this->harvestDate = $harvestDate;
        return $this;
    }

    public function getHoneyType(): HoneyType
    {
        return $this->honeyType;
    }

    public function setHoneyType(HoneyType $honeyType): Harvest
    {
        $this->honeyType = $honeyType;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): Harvest
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getApiary(): Apiary
    {
        return $this->apiary;
    }

    public function setApiary(Apiary $apiary): Harvest
    {
        $this->apiary = $apiary;
        return $this;
    }
}