<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\ValueObject;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;

readonly class LiteralString implements ValueObjectInterface
{
    public function __construct(protected string $value)
    {
    }

    public static function createFromString(string $value): LiteralString {
        return new static($value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isEmpty(): bool
    {
        return empty($this->value);
    }

    public function getLength(): int
    {
        return strlen($this->value);
    }

    public function __toString(): string
    {
        return $this->value;
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
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
