<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\UseCase;

use HelloBees\SharedKernel\Domain\Exception\DomainException;

readonly class ResponseError
{
    public function __construct(
        private string $message,
        private array $options = [],
        private ?DomainException $exception = null
    ) {
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getException(): ?DomainException
    {
        return $this->exception;
    }
}
