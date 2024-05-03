<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\Exception;

use Throwable;

/**
 * Class
 *
 * @class   JsonException
 * @package HelloBees\Domain\SharedKernel\Exception
 */
class JsonException extends DomainException
{
    /**
     * JsonException constructor
     *
     * @param string         $message
     * @param array<mixed>   $options
     * @param Throwable|null $previous
     */
    public function __construct(string $message, array $options = [], Throwable $previous = null)
    {
        parent::__construct($message, self::CODE_INTERNAL_ERROR, $options, $previous);
        $this->AddOption('json_last_error', json_last_error());
        $this->AddOption('json_last_error_message', json_last_error_msg());
    }
}
