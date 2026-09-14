<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Entity;

use HelloBees\BeeKeeping\Domain\Enum\BroodType;
use HelloBees\BeeKeeping\Domain\Enum\StockLevel;
use HelloBees\SharedKernel\Domain\Enum\AlertLevel;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

class Visit extends \HelloBees\SharedKernel\Domain\Entity\Entity
{
    public function __construct(
        Uuid                 $uuid,
        protected DateTime   $created,
        protected DateTime   $visitedDate,
        protected DateTime   $swarmInstallDate,
        protected Beehive    $beehive,
        protected BeeKeeper  $beeKeeper,
        protected bool       $foundQueen,
        protected bool       $eggLaying,
        protected bool       $queenCell,
        protected BroodType  $brood,
        protected int        $nbBroodFrame,
        protected StockLevel $stockLevel,
        protected int        $nbStockFrame,
        protected AlertLevel $alert,
        protected string     $comment,
    )
    {
        parent::__construct($uuid);
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): Visit
    {
        $this->created = $created;
        return $this;
    }

    public function getVisitedDate(): DateTime
    {
        return $this->visitedDate;
    }

    public function setVisitedDate(DateTime $visitedDate): Visit
    {
        $this->visitedDate = $visitedDate;
        return $this;
    }

    public function getSwarmInstallDate(): DateTime
    {
        return $this->swarmInstallDate;
    }

    public function setSwarmInstallDate(DateTime $swarmInstallDate): Visit
    {
        $this->swarmInstallDate = $swarmInstallDate;
        return $this;
    }

    public function getBeehive(): Beehive
    {
        return $this->beehive;
    }

    public function setBeehive(Beehive $beehive): Visit
    {
        $this->beehive = $beehive;
        return $this;
    }

    public function getBeeKeeper(): BeeKeeper
    {
        return $this->beeKeeper;
    }

    public function setBeeKeeper(BeeKeeper $beeKeeper): Visit
    {
        $this->beeKeeper = $beeKeeper;
        return $this;
    }

    public function isFoundQueen(): bool
    {
        return $this->foundQueen;
    }

    public function setFoundQueen(bool $foundQueen): Visit
    {
        $this->foundQueen = $foundQueen;
        return $this;
    }

    public function isEggLaying(): bool
    {
        return $this->eggLaying;
    }

    public function setEggLaying(bool $eggLaying): Visit
    {
        $this->eggLaying = $eggLaying;
        return $this;
    }

    public function isQueenCell(): bool
    {
        return $this->queenCell;
    }

    public function setQueenCell(bool $queenCell): Visit
    {
        $this->queenCell = $queenCell;
        return $this;
    }

    public function getBrood(): BroodType
    {
        return $this->brood;
    }

    public function setBrood(BroodType $brood): Visit
    {
        $this->brood = $brood;
        return $this;
    }

    public function getNbBroodFrame(): int
    {
        return $this->nbBroodFrame;
    }

    public function setNbBroodFrame(int $nbBroodFrame): Visit
    {
        $this->nbBroodFrame = $nbBroodFrame;
        return $this;
    }

    public function getStockLevel(): StockLevel
    {
        return $this->stockLevel;
    }

    public function setStockLevel(StockLevel $stockLevel): Visit
    {
        $this->stockLevel = $stockLevel;
        return $this;
    }

    public function getNbStockFrame(): int
    {
        return $this->nbStockFrame;
    }

    public function setNbStockFrame(int $nbStockFrame): Visit
    {
        $this->nbStockFrame = $nbStockFrame;
        return $this;
    }

    public function getAlert(): AlertLevel
    {
        return $this->alert;
    }

    public function setAlert(AlertLevel $alert): Visit
    {
        $this->alert = $alert;
        return $this;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): Visit
    {
        $this->comment = $comment;
        return $this;
    }

}