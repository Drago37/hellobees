<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\ValueObject;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;

/**
 * Interface
 *
 * @class   ValueObjectInterface
 * @package HelloBees\Domain\SharedKernel\ValueObject
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
