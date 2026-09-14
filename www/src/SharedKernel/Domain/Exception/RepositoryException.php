<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\Exception;

use Throwable;

class RepositoryException extends DomainException
{
    public function __construct(string $message, array $options = [], Throwable $previous = null)
    {
        parent::__construct($message, self::CODE_REPOSITORY_ERROR, $options, $previous);
    }
}
