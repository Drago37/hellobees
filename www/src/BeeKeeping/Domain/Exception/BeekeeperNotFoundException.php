<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\Exception;

use HelloBees\SharedKernel\Domain\Exception\DomainException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use Throwable;

final class BeekeeperNotFoundException extends DomainException
{
    public function __construct(string $message, array $options = [], ?Throwable $previous = null)
    {
        parent::__construct($message, self::CODE_NOT_FOUND_ERROR, $options, $previous);
    }

    public static function withUuid(Uuid $uuid): self
    {
        return new self('Beekeeper not found', ['uuid' => (string) $uuid]);
    }
}
