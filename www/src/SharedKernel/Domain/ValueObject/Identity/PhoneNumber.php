<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\ValueObject\Identity;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\LiteralString;

final readonly class PhoneNumber extends LiteralString
{
    public const PATTERN_NUMBER = "/^[0-9]{10}$/";

    /**
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