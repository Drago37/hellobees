<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\ValueObject;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;

/**
 * Interface
 *
 * @class   ValueObjectInterface
 * @package HelloBees\SharedKernel\Domain\ValueObject
 */
interface ValueObjectInterface
{
    /**
     * @return string
     */
    public function __toString(): string;

    /**
     * @param ValueObjectInterface $object
     * @return bool
     * @throws InvalidValueObjectException
     */
    public function equals(ValueObjectInterface $object): bool;

}
