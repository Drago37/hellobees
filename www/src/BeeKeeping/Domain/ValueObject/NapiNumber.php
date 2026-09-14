<?php

declare(strict_types=1);

namespace HelloBees\BeeKeeping\Domain\ValueObject;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;

/**
 * NAPI format 123456 or 12345678 or A1234567
 */
final readonly class NapiNumber extends \HelloBees\SharedKernel\Domain\ValueObject\LiteralString
{

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function __construct(private string $numeroNapi)
    {
        if (is_numeric($this->numeroNapi)) {
            $length = strlen($this->numeroNapi);
            if ($length !== 6 && $length !== 8) {
                throw new InvalidValueObjectException(
                    'NAPI format is not correct. When it is a numeric, NAPI need to have 6 or 8 numbers',
                    ['napi' => $this->numeroNapi]
                );
            }
        } elseif (
            strlen($this->numeroNapi) !== 8
            || !str_starts_with($this->numeroNapi, 'A')
            || !ctype_digit(substr($this->numeroNapi, 1))
        ) {
            throw new InvalidValueObjectException(
                'NAPI format is not correct. When it is a string, NAPI need to begin by A followed by 7 digits',
                ['napi' => $this->numeroNapi]
            );
        }
        parent::__construct($this->numeroNapi);
    }
}