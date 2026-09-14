<?php

namespace HelloBees\SharedKernel\Domain\ValueObject\Map;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\LiteralString;
use HelloBees\SharedKernel\Domain\ValueObject\ValueObjectInterface;

final readonly class Address implements ValueObjectInterface
{

    public function __construct(
        private LiteralString $street,
        private LiteralString $postalCode,
        private LiteralString $city,
        private ?LiteralString $region,
        private ?LiteralString $country,
    )
    {
    }

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
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
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

    public function getStreet(): LiteralString
    {
        return $this->street;
    }

    public function getPostalCode(): LiteralString
    {
        return $this->postalCode;
    }

    public function getCity(): LiteralString
    {
        return $this->city;
    }

    public function getRegion(): LiteralString
    {
        return $this->region;
    }

    public function getCountry(): LiteralString
    {
        return $this->country;
    }
}