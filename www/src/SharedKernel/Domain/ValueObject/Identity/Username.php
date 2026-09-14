<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\ValueObject\Identity;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\ValueObjectInterface;

final readonly class Username implements ValueObjectInterface
{

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function __construct(private string $firstName, private string $lastName)
    {
        if (empty($firstName)) {
            throw new InvalidValueObjectException('firstname is empty');
        } else if (empty($lastName)) {
            throw new InvalidValueObjectException('lastname is empty');
        }
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function __toString(): string
    {
        return $this->getFullName();
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function equals(ValueObjectInterface $object): bool
    {
        if(!$object instanceof Username) {
            throw new InvalidValueObjectException(
                "Equal checking failed because not a " . get_class($this) . ", " . get_class($object) . "given",
            );
        }
        return $this->getFullName() === $object->getFullName();
    }
}