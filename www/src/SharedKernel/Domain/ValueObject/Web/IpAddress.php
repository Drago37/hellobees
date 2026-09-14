<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\ValueObject\Web;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\LiteralString;

final readonly class IpAddress extends LiteralString
{
    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function __construct(string $ip_address)
    {
        if (!filter_var($ip_address, FILTER_VALIDATE_IP)) {
            throw new InvalidValueObjectException("Invalid IP Address");
        }
        parent::__construct($ip_address);
    }
}
