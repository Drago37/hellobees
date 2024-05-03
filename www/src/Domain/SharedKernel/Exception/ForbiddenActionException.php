<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\Exception;

use Throwable;

/**
 * Class
 *
 * @class   ForbiddenActionException
 * @package HelloBees\Domain\SharedKernel\Exception
 */
class ForbiddenActionException extends DomainException
{
    /**
     * ForbiddenActionException constructor
     *
     * @param string         $message
     * @param array<mixed>   $options
     * @param Throwable|null $previous
     */
    public function __construct(string $message, array $options = [], Throwable $previous = null)
    {
        parent::__construct($message, self::CODE_NOT_ALLOWED_ERROR, $options, $previous);
    }
}
