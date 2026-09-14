<?php

declare(strict_types=1);

namespace HelloBeesTest\BeeKeeping\Domain\ValueObject;

use HelloBees\BeeKeeping\Domain\ValueObject\NapiNumber;
use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class NapiNumberTest extends TestCase
{
    /**
     * @return array<string, array{string}>
     */
    public static function validNapiProvider(): array
    {
        return [
            'six digits' => ['123456'],
            'eight digits' => ['12345678'],
            'A followed by seven digits' => ['A1234567'],
        ];
    }

    #[DataProvider('validNapiProvider')]
    public function testItAcceptsValidNapiFormats(string $value): void
    {
        self::assertSame($value, (string) new NapiNumber($value));
    }

    /**
     * @return array<string, array{string}>
     */
    public static function invalidNapiProvider(): array
    {
        return [
            'seven digits' => ['1234567'],
            'A followed by six digits' => ['A123456'],
            'A followed by non-digits' => ['A123456X'],
            'no leading A' => ['B1234567'],
            'empty' => [''],
        ];
    }

    #[DataProvider('invalidNapiProvider')]
    public function testItRejectsInvalidNapiFormats(string $value): void
    {
        $this->expectException(InvalidValueObjectException::class);

        new NapiNumber($value);
    }
}
