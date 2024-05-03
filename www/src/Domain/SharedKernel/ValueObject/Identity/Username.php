<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\ValueObject\Identity;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\ValueObjectInterface;

/**
 * Class
 *
 * @class Username
 * @package HelloBees\Domain\SharedKernel\ValueObject\Identity
 */
final readonly class Username implements ValueObjectInterface
{

    /**
     * Username constructor
     *
     * @param string $firstName
     * @param string $lastName
     * @throws InvalidValueObjectException
     */
    public function __construct(private string $firstName, private string $lastName)
    {
        if (empty($firstName)) {
            throw new InvalidValueObjectException('firstname is empty');
        } else if (empty($lastName)) {
            throw new InvalidValueObjectException('lastname is empty');
        }
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getFullName();
    }

    /**
     * @param Username $object
     * @return bool
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