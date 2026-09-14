<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\Exception;

use Throwable;

class JsonException extends DomainException
{
    public function __construct(string $message, array $options = [], Throwable $previous = null)
    {
        parent::__construct($message, self::CODE_INTERNAL_ERROR, $options, $previous);
        $this->AddOption('json_last_error', json_last_error());
        $this->AddOption('json_last_error_message', json_last_error_msg());
    }
}
