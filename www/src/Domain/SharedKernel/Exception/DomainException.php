<?php

declare(strict_types=1);

namespace HelloBees\Domain\SharedKernel\Exception;

use Exception;
use Throwable;

/**
 * Class
 *
 * @class   DomainException
 * @package HelloBees\Domain\SharedKernel\Exception
 */
abstract class DomainException extends Exception
{
    public const CODE_INTERNAL_ERROR = 0;
    public const CODE_REPOSITORY_ERROR = 1;
    public const CODE_NOT_ALLOWED_ERROR = 3;
    public const CODE_BAD_USAGE_ERROR = 4;
    public const CODE_SERVER_ERROR = 5;

    /**
     * @var array<mixed>
     */
    protected array $options = [];

    /**
     * DomainException constructor
     *
     * @param string         $message
     * @param int            $code
     * @param array<mixed>   $options
     * @param Throwable|null $previous
     */
    public function __construct(string $message, int $code, array $options = [], Throwable $previous = null)
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
     * Retourne le nom de la classe instancié (pas la classe mère)
     *
     * @return string
     */
    protected function getClassName(): string
    {
        return get_class($this);
    }

    /**
     * @return array<mixed>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array<mixed> $options
     * @return void
     */
    public function setOptions(array $options): void
    {
        $this->options = $options;
    }

    /**
     * @param string $key
     * @param mixed  $value
     * @return void
     */
    public function addOption(string $key, mixed $value): void
    {
        $this->options[$key] = $value;
    }

    /**
     * @param array<mixed> $options
     * @return void
     */
    public function addOptions(array $options): void
    {
        $this->options = array_merge($this->getOptions(), $options);
    }
}
