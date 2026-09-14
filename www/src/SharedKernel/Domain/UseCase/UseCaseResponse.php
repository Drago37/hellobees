<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\UseCase;

abstract class UseCaseResponse
{
    protected ?ResponseError $error;

    public function isSuccess(): bool
    {
        return $this->error === null;
    }

    public function getError(): ?ResponseError
    {
        return $this->error;
    }

    public function setError(ResponseError $error): UseCaseResponse
    {
        $this->error = $error;
        return $this;
    }
}
