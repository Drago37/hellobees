<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Entity;

use HelloBees\BeeKeeping\Domain\Enum\BeeKeeperType;
use HelloBees\BeeKeeping\Domain\ValueObject\NapiNumber;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

/**
 * Class
 * @class BeeKeeper
 * @package HelloBees\Domain\BeeKeeping\Entity
 */
class BeeKeeper extends \HelloBees\SharedKernel\Domain\Entity\Entity
{
    /**
     * BeeKeeper constructor
     *
     * @param \HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid $uuid
     * @param NapiNumber $numeroNapi
     * @param \HelloBees\SharedKernel\Domain\ValueObject\Identity\Username $username
     * @param Email $email
     * @param BeeKeeperType $type
     * @param \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime $created
     */
    public function __construct(
        Uuid                    $uuid,
        protected NapiNumber    $numeroNapi,
        protected Username      $username,
        protected Email         $email,
        protected BeeKeeperType $type,
        protected DateTime      $created
    )
    {
        parent::__construct($uuid);
    }

    /**
     * @return \HelloBees\BeeKeeping\Domain\Enum\BeeKeeperType
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
     * @return \HelloBees\SharedKernel\Domain\ValueObject\Identity\Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @param \HelloBees\SharedKernel\Domain\ValueObject\Identity\Email $email
     *
     * @return BeeKeeper
     */
    public function setEmail(Email $email): BeeKeeper
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return \HelloBees\SharedKernel\Domain\ValueObject\Identity\Username
     */
    public function getUsername(): Username
    {
        return $this->username;
    }

    /**
     * @param \HelloBees\SharedKernel\Domain\ValueObject\Identity\Username $username
     *
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
     * @param \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime $created
     *
     * @return $this
     */
    public function setCreated(DateTime $created): BeeKeeper
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return NapiNumber
     */
    public function getNumeroNapi(): NapiNumber
    {
        return $this->numeroNapi;
    }

    /**
     * @param NapiNumber $numeroNapi
     *
     * @return $this
     */
    public function setNumeroNapi(NapiNumber $numeroNapi): BeeKeeper
    {
        $this->numeroNapi = $numeroNapi;
        return $this;
    }
}