<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Entity;

use HelloBees\BeeKeeping\Domain\Enum\BeeKeeperType;
use HelloBees\BeeKeeping\Domain\ValueObject\NapiNumber;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;

class BeeKeeper extends \HelloBees\SharedKernel\Domain\Entity\Entity
{
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

    public function getType(): BeeKeeperType
    {
        return $this->type;
    }

    public function setType(BeeKeeperType $type): BeeKeeper
    {
        $this->type = $type;
        return $this;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email): BeeKeeper
    {
        $this->email = $email;
        return $this;
    }

    public function getUsername(): Username
    {
        return $this->username;
    }

    public function setUsername(Username $username): BeeKeeper
    {
        $this->username = $username;
        return $this;
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): BeeKeeper
    {
        $this->created = $created;
        return $this;
    }

    public function getNumeroNapi(): NapiNumber
    {
        return $this->numeroNapi;
    }

    public function setNumeroNapi(NapiNumber $numeroNapi): BeeKeeper
    {
        $this->numeroNapi = $numeroNapi;
        return $this;
    }
}