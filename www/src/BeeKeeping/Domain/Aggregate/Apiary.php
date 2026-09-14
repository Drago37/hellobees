<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Aggregate;

use HelloBees\BeeKeeping\Domain\Collection\BeehiveCollection;
use HelloBees\BeeKeeping\Domain\Entity\BeeKeeper;
use HelloBees\BeeKeeping\Domain\Enum\ApiaryEnvironment;
use HelloBees\SharedKernel\Domain\Entity\Entity;
use HelloBees\SharedKernel\Domain\Exception\InvariantException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBees\SharedKernel\Domain\ValueObject\Map\Coordinates;

/**
 * Class
 * @class Apiary
 * @package HelloBees\Domain\BeeKeeping\Aggregate
 */
class Apiary extends Entity
{
    /**
     * Apiary constructor
     *
     * @param Uuid $uuid
     * @param BeeKeeper $beeKeeper
     * @param BeehiveCollection $beehiveCollection
     * @param Coordinates $coordinates
     * @param \HelloBees\BeeKeeping\Domain\Enum\ApiaryEnvironment $apiaryEnvironment
     * @param DateTime $created
     *
     * @throws InvariantException
     */
    public function __construct(
        Uuid                        $uuid,
        protected BeeKeeper         $beeKeeper,
        protected BeehiveCollection $beehiveCollection,
        protected Coordinates       $coordinates,
        protected ApiaryEnvironment $apiaryEnvironment,
        protected DateTime          $created
    )
    {
        parent::__construct($uuid);
        if (!$this->validate()) {
            throw new InvariantException('Apiary invariants are not respected');
        }
    }

    /**
     * @return bool
     */
    public function validate(): bool
    {
        // TODO put here invariants
        return true;
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
     * @return $this
     */
    public function setBeeKeeper(BeeKeeper $beeKeeper): Apiary
    {
        $this->beeKeeper = $beeKeeper;
        return $this;
    }

    /**
     * @return BeehiveCollection
     */
    public function getBeehiveCollection(): BeehiveCollection
    {
        return $this->beehiveCollection;
    }

    /**
     * @param \HelloBees\BeeKeeping\Domain\Collection\BeehiveCollection $beehiveCollection
     *
     * @return $this
     */
    public function setBeehiveCollection(BeehiveCollection $beehiveCollection): Apiary
    {
        $this->beehiveCollection = $beehiveCollection;
        return $this;
    }

    /**
     * @return Coordinates
     */
    public function getCoordinates(): Coordinates
    {
        return $this->coordinates;
    }

    /**
     * @param \HelloBees\SharedKernel\Domain\ValueObject\Map\Coordinates $coordinates
     *
     * @return $this
     */
    public function setCoordinates(Coordinates $coordinates): Apiary
    {
        $this->coordinates = $coordinates;
        return $this;
    }

    /**
     * @return \HelloBees\BeeKeeping\Domain\Enum\ApiaryEnvironment
     */
    public function getApiaryEnvironment(): ApiaryEnvironment
    {
        return $this->apiaryEnvironment;
    }

    /**
     * @param \HelloBees\BeeKeeping\Domain\Enum\ApiaryEnvironment $apiaryEnvironment
     *
     * @return $this
     */
    public function setApiaryEnvironment(ApiaryEnvironment $apiaryEnvironment): Apiary
    {
        $this->apiaryEnvironment = $apiaryEnvironment;
        return $this;
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): Apiary
    {
        $this->created = $created;
        return $this;
    }
}