<?php

declare(strict_types=1);

namespace HelloBees\Domain\Selling\Entity;

use HelloBees\Domain\SharedKernel\Entity\Entity;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\DateTime;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Email;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\PhoneNumber;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Username;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Uuid;
use HelloBees\Domain\SharedKernel\ValueObject\Map\Address;

/**
 * Class
 *
 * @class Customer
 * @package HelloBees\Domain\Selling\Entity
 */
class Customer extends Entity
{
    /**
     * Customer constructor
     *
     * @param Uuid $uuid
     * @param Username $username
     * @param Address $address
     * @param Email $email
     * @param PhoneNumber $phoneNumber
     * @param DateTime $created
     */
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

    /**
     * @return Username
     */
    public function getUsername(): Username
    {
        return $this->username;
    }

    /**
     * @param Username $username
     * @return Customer
     */
    public function setUsername(Username $username): Customer
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return Customer
     */
    public function setAddress(Address $address): Customer
    {
        $this->address = $address;
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
     * @return Customer
     */
    public function setEmail(Email $email): Customer
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return PhoneNumber
     */
    public function getPhoneNumber(): PhoneNumber
    {
        return $this->phoneNumber;
    }

    /**
     * @param PhoneNumber $phoneNumber
     * @return Customer
     */
    public function setPhoneNumber(PhoneNumber $phoneNumber): Customer
    {
        $this->phoneNumber = $phoneNumber;
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
    public function setCreated(DateTime $created): Customer
    {
        $this->created = $created;
        return $this;
    }
}