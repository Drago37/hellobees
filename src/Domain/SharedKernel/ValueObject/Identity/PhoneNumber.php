<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\ValueObject\Identity;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\LiteralString;
use HelloBees\Domain\SharedKernel\ValueObject\ValueObjectInterface;

/**
 * Class
 *
 * @class PhoneNumber
 * @package HelloBees\Domain\SharedKernel\ValueObject\Identity
 */
final readonly class PhoneNumber extends LiteralString
{
    public const PATTERN_NUMBER = "/^[0-9]{10}$/";

    /**
     * @param string $value
     * @throws InvalidValueObjectException
     */
    public function __construct(string $value)
    {
        if (!preg_match(self::PATTERN_NUMBER, $value)) {
            throw new InvalidValueObjectException('Phone number is not correct', ['phone_number' => $value]);
        }
        parent::__construct($value);
    }
}