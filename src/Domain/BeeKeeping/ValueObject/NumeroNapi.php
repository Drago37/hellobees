<?php

declare(strict_types=1);

namespace HelloBees\Domain\BeeKeeping\ValueObject;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\LiteralString;

/**
 * Class
 *
 * @class NumeroNapi
 * @package HelloBees\Domain\BeeKeeping\ValueObject
 * @description NAPI format 123456 or 12345678 or A1234567
 */
final readonly class NumeroNapi extends LiteralString
{

    /**
     * NumeroNapi constructor
     *
     * @param string $numeroNapi
     * @throws InvalidValueObjectException
     */
    public function __construct(private string $numeroNapi)
    {
        if (
            is_numeric($this->numeroNapi)
            && (strlen($this->numeroNapi) < 6 || strlen($this->numeroNapi) === 7 || strlen($this->numeroNapi) > 8
            )
        ) {
            throw new InvalidValueObjectException(
                'NAPI format is not correct. When it is a numeric, NAPI need to have 6 or 8 numbers',
                ['napi' => $this->numeroNapi]
            );
        } elseif (is_string($this->numeroNapi)) {
            if (strlen($this->numeroNapi) !== 8 || mb_strpos('A', $this->numeroNapi) !== 0) {
                throw new InvalidValueObjectException(
                    'NAPI format is not correct. When it is a string, NAPI need to have 8 characters and need to begin by A',
                    ['napi' => $this->numeroNapi]
                );
            } else {
                $intNapi = (int)$this->numeroNapi;
                if (strlen((string)$intNapi) !== 7) {
                    throw new InvalidValueObjectException(
                        'NAPI format is not correct. When it is a string, NAPI need to have 7 integers',
                        ['napi' => $this->numeroNapi, 'intNapi' => $intNapi]
                    );
                }
            }
        }
        parent::__construct($this->numeroNapi);
    }
}