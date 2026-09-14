<?php

declare(strict_types=1);

namespace HelloBeesTest\Domain\SharedKernel\ValueObject;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date;
use HelloBees\SharedKernel\Domain\ValueObject\LiteralString;
use PHPUnit\Framework\TestCase;

/**
 * Class
 *
 * @class   LiteralStringTest
 * @package HelloBeesTest\Domain\ValueObject
 */
class LiteralStringTest extends TestCase
{

    /**
     * @return void
     */
    public function testLiteralStringIsCorrect(): void {
        $string = "foo";
        $literalString = new \HelloBees\SharedKernel\Domain\ValueObject\LiteralString($string);
        self::assertEquals($string, $literalString);
    }

    /**
     * @return void
     */
    public function testCreateFromString(): void {
        $string = "foo";
        $literalString = \HelloBees\SharedKernel\Domain\ValueObject\LiteralString::createFromString($string);
        self::assertEquals($string, $literalString);
    }

    /**
     * @return void
     */
    public function testGetValue(): void {
        $string = "foo";
        $literalString = LiteralString::createFromString($string);
        self::assertEquals($string, $literalString->getValue());
    }

    /**
     * @return void
     */
    public function testIsEmpty(): void {
        $string = "";
        $literalString = LiteralString::createFromString($string);
        self::assertTrue($literalString->isEmpty());
    }

    /**
     * @return void
     */
    public function testGetLength(): void {
        $literalString = LiteralString::createFromString("foo");
        self::assertEquals(3, $literalString->getLength());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsEqual(): void {
        $literalString1 = \HelloBees\SharedKernel\Domain\ValueObject\LiteralString::createFromString("foo");
        $literalString2 = LiteralString::createFromString("foo");
        self::assertTrue($literalString1->equals($literalString2));
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsNotEqual(): void {
        $literalString1 = LiteralString::createFromString("foo");
        $literalString2 = \HelloBees\SharedKernel\Domain\ValueObject\LiteralString::createFromString("bar");
        self::assertFalse($literalString1->equals($literalString2));
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectParamType(): void
    {
        $this->expectException(\TypeError::class);
        $literalString1 = LiteralString::createFromString("foo");
        $literalString2 = new \DateTime();
        $literalString1->equals($literalString2);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectValueObjectParamType(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        $literalString1 = LiteralString::createFromString("foo");
        $literalString2 = new Date(2024,1,1);
        $literalString1->equals($literalString2);
    }

    /**
     * @return void
     */
    public function testMagicToString(): void
    {
        $literalString1 = \HelloBees\SharedKernel\Domain\ValueObject\LiteralString::createFromString("foo");
        self::assertEquals("foo", $literalString1);
    }

}
