<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Entity;

use HelloBees\Domain\BeeKeeping\Enum\BroodType;
use HelloBees\Domain\BeeKeeping\Enum\StockLevel;
use HelloBees\Domain\SharedKernel\Entity\Entity;
use HelloBees\Domain\SharedKernel\Enum\AlertLevel;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\DateTime;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Class
 *
 * @class Visit
 * @package HelloBees\Domain\BeeKeeping\Entity
 */
class Visit extends Entity
{
    /**
     * Visit constructor
     *
     * @param Uuid $uuid
     * @param DateTime $created
     * @param DateTime $visitedDate
     * @param DateTime $swarmInstallDate
     * @param Beehive $beehive
     * @param BeeKeeper $beeKeeper
     * @param bool $foundQueen
     * @param bool $eggLaying
     * @param bool $queenCell
     * @param BroodType $brood
     * @param int $nbBroodFrame
     * @param StockLevel $stockLevel
     * @param int $nbStockFrame
     * @param AlertLevel $alert
     * @param string $comment
     */
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

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     * @return Visit
     */
    public function setCreated(DateTime $created): Visit
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getVisitedDate(): DateTime
    {
        return $this->visitedDate;
    }

    /**
     * @param DateTime $visitedDate
     * @return Visit
     */
    public function setVisitedDate(DateTime $visitedDate): Visit
    {
        $this->visitedDate = $visitedDate;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getSwarmInstallDate(): DateTime
    {
        return $this->swarmInstallDate;
    }

    /**
     * @param DateTime $swarmInstallDate
     * @return Visit
     */
    public function setSwarmInstallDate(DateTime $swarmInstallDate): Visit
    {
        $this->swarmInstallDate = $swarmInstallDate;
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
     * @return Visit
     */
    public function setBeehive(Beehive $beehive): Visit
    {
        $this->beehive = $beehive;
        return $this;
    }

    /**
     * @return BeeKeeper
     */
    public function getBeeKeeper(): BeeKeeper
    {
        return $this->beeKeeper;
    }

    /**
     * @param BeeKeeper $beeKeeper
     * @return Visit
     */
    public function setBeeKeeper(BeeKeeper $beeKeeper): Visit
    {
        $this->beeKeeper = $beeKeeper;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFoundQueen(): bool
    {
        return $this->foundQueen;
    }

    /**
     * @param bool $foundQueen
     * @return Visit
     */
    public function setFoundQueen(bool $foundQueen): Visit
    {
        $this->foundQueen = $foundQueen;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEggLaying(): bool
    {
        return $this->eggLaying;
    }

    /**
     * @param bool $eggLaying
     * @return Visit
     */
    public function setEggLaying(bool $eggLaying): Visit
    {
        $this->eggLaying = $eggLaying;
        return $this;
    }

    /**
     * @return bool
     */
    public function isQueenCell(): bool
    {
        return $this->queenCell;
    }

    /**
     * @param bool $queenCell
     * @return Visit
     */
    public function setQueenCell(bool $queenCell): Visit
    {
        $this->queenCell = $queenCell;
        return $this;
    }

    /**
     * @return BroodType
     */
    public function getBrood(): BroodType
    {
        return $this->brood;
    }

    /**
     * @param BroodType $brood
     * @return Visit
     */
    public function setBrood(BroodType $brood): Visit
    {
        $this->brood = $brood;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbBroodFrame(): int
    {
        return $this->nbBroodFrame;
    }

    /**
     * @param int $nbBroodFrame
     * @return Visit
     */
    public function setNbBroodFrame(int $nbBroodFrame): Visit
    {
        $this->nbBroodFrame = $nbBroodFrame;
        return $this;
    }

    /**
     * @return StockLevel
     */
    public function getStockLevel(): StockLevel
    {
        return $this->stockLevel;
    }

    /**
     * @param StockLevel $stockLevel
     * @return Visit
     */
    public function setStockLevel(StockLevel $stockLevel): Visit
    {
        $this->stockLevel = $stockLevel;
        return $this;
    }

    /**
     * @return int
     */
    public function getNbStockFrame(): int
    {
        return $this->nbStockFrame;
    }

    /**
     * @param int $nbStockFrame
     * @return Visit
     */
    public function setNbStockFrame(int $nbStockFrame): Visit
    {
        $this->nbStockFrame = $nbStockFrame;
        return $this;
    }

    /**
     * @return AlertLevel
     */
    public function getAlert(): AlertLevel
    {
        return $this->alert;
    }

    /**
     * @param AlertLevel $alert
     * @return Visit
     */
    public function setAlert(AlertLevel $alert): Visit
    {
        $this->alert = $alert;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return Visit
     */
    public function setComment(string $comment): Visit
    {
        $this->comment = $comment;
        return $this;
    }

}