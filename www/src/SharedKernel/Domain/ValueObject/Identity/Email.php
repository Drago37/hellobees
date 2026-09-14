<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\ValueObject\Identity;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\LiteralString;

final readonly class Email extends LiteralString
{
    /**
     * @throws InvalidValueObjectException
     */
    public function __construct(string $value)
    {
        if (empty($value) || !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidValueObjectException(
                "Invalid email",
                [
                    'value' => $value,
                ]
            );
        }
        parent::__construct($value);
    }

    /**
     * Returns the local part of the email address.
     */
    public function getLocalPart(): LiteralString
    {
        $parts = explode('@', $this->value);
        return new LiteralString($parts[0]);
    }

    /**
     * Returns the domain part of the email address.
     */
    public function getDomainPart(): LiteralString
    {
        $parts = explode('@', $this->value);
        return new LiteralString($parts[1]);
    }
}
