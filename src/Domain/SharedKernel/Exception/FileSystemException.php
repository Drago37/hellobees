<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\Exception;

use Throwable;

/**
 * Class
 *
 * @class   FileSystemException
 * @package HelloBees\Domain\SharedKernel\Exception
 */
class FileSystemException extends DomainException
{
    /**
     * FileSystemException constructor
     *
     * @param string         $message
     * @param array<mixed>   $options
     * @param Throwable|null $previous
     */
    public function __construct(string $message, array $options = [], Throwable $previous = null)
    {
        parent::__construct($message, self::CODE_SERVER_ERROR, $options, $previous);
    }
}
