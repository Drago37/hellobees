<?php

declare(strict_types=1);

namespace HelloBees\Sales\Domain\Entity;

use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use HelloBees\SharedKernel\Domain\ValueObject\Map\Address;

class Customer extends \HelloBees\SharedKernel\Domain\Entity\Entity
{
    public function __construct(
        Uuid                  $uuid,
        protected Username    $username,
        protected Address     $address,
        protected Email       $email,
        protected PhoneNumber $phoneNumber,
        protected DateTime    $created,
    )
    {
        parent::__construct($uuid);
    }

    public function getUsername(): Username
    {
        return $this->username;
    }

    public function setUsername(Username $username): Customer
    {
        $this->username = $username;
        return $this;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): Customer
    {
        $this->address = $address;
        return $this;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function setEmail(Email $email): Customer
    {
        $this->email = $email;
        return $this;
    }

    public function getPhoneNumber(): PhoneNumber
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(PhoneNumber $phoneNumber): Customer
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): Customer
    {
        $this->created = $created;
        return $this;
    }
}