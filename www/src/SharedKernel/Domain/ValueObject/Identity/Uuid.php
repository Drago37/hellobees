<?php

declare(strict_types=1);

namespace HelloBees\SharedKernel\Domain\ValueObject\Identity;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\LiteralString;
use Ramsey\Uuid\Uuid as BaseUuid;
use Ramsey\Uuid\Validator\GenericValidator;

/**
 * Class
 *
 * @class   Uuid
 * @package HelloBees\Domain\SharedKernel\ValueObject\Identity
 * @phpstan-consistent-constructor
 */
final readonly class Uuid extends LiteralString
{
    /**
     * @param string $value
     *
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function __construct(string $value)
    {
        $validator = new GenericValidator();
        $pattern = '/' . $validator->getPattern() . '/';

        if (!\preg_match($pattern, $value)) {
            throw new InvalidValueObjectException(
                "the passed UUID value doesn't match the pattern", [
                'value' => $value,
                'pattern' => $pattern,
            ]
            );
        }
        parent::__construct($value);
    }

    /**
     * Generate a new UNIQUE ID
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return Uuid
     */
    public static function generate(): Uuid
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        return new self((string) BaseUuid::uuid4());
    }

}
