<?php

namespace HelloBees\Domain\SharedKernel\ValueObject\Map;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\LiteralString;
use HelloBees\Domain\SharedKernel\ValueObject\ValueObjectInterface;

/**
 * Class
 *
 * @class Address
 * @package HelloBees\Domain\SharedKernel\ValueObject\Map
 */
final readonly class Address implements ValueObjectInterface
{

    /**
     * Address constructor
     *
     * @param LiteralString $street
     * @param LiteralString $postalCode
     * @param LiteralString $city
     * @param LiteralString|null $region
     * @param LiteralString|null $country
     */
    public function __construct(
        private LiteralString $street,
        private LiteralString $postalCode,
        private LiteralString $city,
        private ?LiteralString $region,
        private ?LiteralString $country,
    )
    {
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $address = "$this->street $this->postalCode $this->city";
        if(!is_null($this->region)) {
            $address .= " $this->region";
        }
        if(!is_null($this->country)) {
            $address .= " $this->country";
        }
        return $address;
    }

    /**
     * @param Address $object
     * @return bool
     * @throws InvalidValueObjectException
     */
    public function equals(ValueObjectInterface $object): bool
    {
        if(!$object instanceof Address) {
            throw new InvalidValueObjectException(
                "Equal checking failed because not a " . get_class($this) . ", " . get_class($object) . "given",
            );
        }
        return ($this->street === $object->getStreet())
            && ($this->postalCode === $object->getPostalCode())
            && ($this->city === $object->getCity())
            && ($this->region === $object->getRegion())
            && ($this->country === $object->getCountry());
    }

    /**
     * @return LiteralString
     */
    public function getStreet(): LiteralString
    {
        return $this->street;
    }

    /**
     * @return LiteralString
     */
    public function getPostalCode(): LiteralString
    {
        return $this->postalCode;
    }

    /**
     * @return LiteralString
     */
    public function getCity(): LiteralString
    {
        return $this->city;
    }

    /**
     * @return LiteralString
     */
    public function getRegion(): LiteralString
    {
        return $this->region;
    }

    /**
     * @return LiteralString
     */
    public function getCountry(): LiteralString
    {
        return $this->country;
    }
}