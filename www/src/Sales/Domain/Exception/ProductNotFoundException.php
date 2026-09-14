<?php

declare(strict_types=1);

namespace HelloBees\Sales\Domain\Exception;

use HelloBees\SharedKernel\Domain\Exception\DomainException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use Throwable;

final class ProductNotFoundException extends DomainException
{
    public function __construct(string $message, array $options = [], ?Throwable $previous = null)
    {
        parent::__construct($message, self::CODE_NOT_FOUND_ERROR, $options, $previous);
    }

    public static function withUuid(Uuid $uuid): self
    {
        return new self('Product not found', ['uuid' => (string) $uuid]);
    }
}
