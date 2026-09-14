<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\ValueObject;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;

/**
 * Class
 *
 * @class   LiteralString
 * @package HelloBees\Domain\SharedKernel\ValueObject
 */
readonly class LiteralString implements ValueObjectInterface
{
    /**
     * $literalString constructor
     *
     * @param string $value
     */
    public function __construct(protected string $value)
    {
    }

    /**
     * @param string $value
     * @return LiteralString
     */
    public static function createFromString(string $value): LiteralString {
        return new static($value);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->value);
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return strlen($this->value);
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * @param ValueObjectInterface $object
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return bool
     */
    public function equals(ValueObjectInterface $object): bool
    {
        if(!$object instanceof static) {
            throw new InvalidValueObjectException(
                "Equal checking failed because not a " . get_class($this) . ", " . get_class($object) . "given",
            );
        }
        return $this->value === $object->getValue();
    }
}
