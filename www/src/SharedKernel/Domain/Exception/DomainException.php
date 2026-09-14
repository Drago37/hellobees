<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\Exception;

use Exception;
use Throwable;

abstract class DomainException extends Exception
{
    public const CODE_INTERNAL_ERROR = 0;
    public const CODE_REPOSITORY_ERROR = 1;
    public const CODE_NOT_ALLOWED_ERROR = 3;
    public const CODE_BAD_USAGE_ERROR = 4;
    public const CODE_SERVER_ERROR = 5;

    protected array $options = [];

    public function __construct(string $message, int $code, array $options = [], ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->addOption('exception_type', $this->getClassName());
        $this->addOption('message', $this->getMessage());
        $this->addOption('file', $this->getFile());
        $this->addOption('line', $this->getLine());

        if (!empty($this->getTrace())) {
            if (isset($this->getTrace()[0]['class'])) {
                $this->addOption('class', $this->getTrace()[0]['class']);
            }
            if (isset($this->getTrace()[0]['function'])) {
                $this->addOption('method', $this->getTrace()[0]['function']);
            }
        }

        $this->addOption('previous', $this->getPrevious());

        $this->addOptions($options);
    }

    /**
     * Returns the name of the instantiated class (not the parent class)
     */
    protected function getClassName(): string
    {
        return get_class($this);
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function setOptions(array $options): void
    {
        $this->options = $options;
    }

    public function addOption(string $key, mixed $value): void
    {
        $this->options[$key] = $value;
    }

    public function addOptions(array $options): void
    {
        $this->options = array_merge($this->getOptions(), $options);
    }
}
