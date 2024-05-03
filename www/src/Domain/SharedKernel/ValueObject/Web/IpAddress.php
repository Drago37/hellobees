<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\ValueObject\Web;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\LiteralString;

/**
 * Class
 *
 * @class   IpAddress
 * @package HelloBees\Domain\SharedKernel\ValueObject\Web
 */
final readonly class IpAddress extends LiteralString
{
    /**
     * IpAddress constructor
     *
     * @param string $ip_address
     * @throws InvalidValueObjectException
     */
    public function __construct(string $ip_address)
    {
        if (!filter_var($ip_address, FILTER_VALIDATE_IP)) {
            throw new InvalidValueObjectException("Invalid IP Address");
        }
        parent::__construct($ip_address);
    }
}
