<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\ValueObject;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;

interface ValueObjectInterface
{
    public function __toString(): string;

    /**
     * @throws InvalidValueObjectException
     */
    public function equals(ValueObjectInterface $object): bool;

}
