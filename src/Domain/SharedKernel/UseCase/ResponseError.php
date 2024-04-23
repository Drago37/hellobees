<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\UseCase;

use HelloBees\Domain\SharedKernel\Exception\DomainException;

/**
 * Class
 *
 * @class   ResponseError
 * @package HelloBees\Domain\SharedKernel\UseCase
 */
readonly class ResponseError
{
    /**
     * ResponseError constructor
     *
     * @param string               $message
     * @param array<mixed>         $options
     * @param DomainException|null $exception
     */
    public function __construct(
        private string $message,
        private array $options = [],
        private ?DomainException $exception = null
    ) {
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return array<mixed>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return DomainException|null
     */
    public function getException(): ?DomainException
    {
        return $this->exception;
    }
}
