<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\Exception;

use Throwable;

class ForbiddenActionException extends DomainException
{
    public function __construct(string $message, array $options = [], Throwable $previous = null)
    {
        parent::__construct($message, self::CODE_NOT_ALLOWED_ERROR, $options, $previous);
    }
}
