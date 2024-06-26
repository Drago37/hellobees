<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\ValueObject\Identity;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\LiteralString;

/**
 * Class
 *
 * @class   Email
 * @package HelloBees\Domain\SharedKernel\ValueObject\Identity
 */
final readonly class Email extends LiteralString
{
    /**
     * @param string $value
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
     *
     * @return LiteralString
     */
    public function getLocalPart(): LiteralString
    {
        $parts = explode('@', $this->value);
        return new LiteralString($parts[0]);
    }

    /**
     * Returns the domain part of the email address.
     *
     * @return LiteralString
     */
    public function getDomainPart(): LiteralString
    {
        $parts = explode('@', $this->value);
        return new LiteralString($parts[1]);
    }
}
