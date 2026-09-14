<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\UseCase;

/**
 * Class
 *
 * @class   UseCaseResponse
 * @package HelloBees\SharedKernel\Domain\UseCase
 */
abstract class UseCaseResponse
{
    /** @var null|ResponseError */
    protected ?ResponseError $error;

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->error === null;
    }

    /**
     * @return null|ResponseError
     */
    public function getError(): ?ResponseError
    {
        return $this->error;
    }

    /**
     * @param ResponseError $error
     * @return UseCaseResponse
     */
    public function setError(ResponseError $error): UseCaseResponse
    {
        $this->error = $error;
        return $this;
    }
}
