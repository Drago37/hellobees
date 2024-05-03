<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\Entity;

use HelloBees\Domain\BeeKeeping\Enum\BeeKeeperType;
use HelloBees\Domain\BeeKeeping\ValueObject\NumeroNapi;
use HelloBees\Domain\SharedKernel\Entity\Entity;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\DateTime;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Email;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Username;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;

/**
 * Class
 * @class BeeKeeper
 * @package HelloBees\Domain\BeeKeeping\Entity
 */
class BeeKeeper extends Entity
{
    /**
     * BeeKeeper constructor
     *
     * @param Uuid $uuid
     * @param NumeroNapi $numeroNapi
     * @param Username $username
     * @param Email $email
     * @param BeeKeeperType $type
     * @param DateTime $created
     */
    public function __construct(
        Uuid                    $uuid,
        protected NumeroNapi    $numeroNapi,
        protected Username      $username,
        protected Email         $email,
        protected BeeKeeperType $type,
        protected DateTime      $created
    )
    {
        parent::__construct($uuid);
    }

    /**
     * @return BeeKeeperType
     */
    public function getType(): BeeKeeperType
    {
        return $this->type;
    }

    /**
     * @param BeeKeeperType $type
     * @return $this
     */
    public function setType(BeeKeeperType $type): BeeKeeper
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @param Email $email
     * @return BeeKeeper
     */
    public function setEmail(Email $email): BeeKeeper
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return Username
     */
    public function getUsername(): Username
    {
        return $this->username;
    }

    /**
     * @param Username $username
     * @return $this
     */
    public function setUsername(Username $username): BeeKeeper
    {
        $this->username = $username;
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
    public function setCreated(DateTime $created): BeeKeeper
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return NumeroNapi
     */
    public function getNumeroNapi(): NumeroNapi
    {
        return $this->numeroNapi;
    }

    /**
     * @param NumeroNapi $numeroNapi
     * @return $this
     */
    public function setNumeroNapi(NumeroNapi $numeroNapi): BeeKeeper
    {
        $this->numeroNapi = $numeroNapi;
        return $this;
    }
}