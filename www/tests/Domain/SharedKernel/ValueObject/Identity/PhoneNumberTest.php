<?php

declare(strict_types=1);

namespace HelloBeesTest\Domain\SharedKernel\ValueObject\Identity;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber;
use PHPUnit\Framework\TestCase;

class PhoneNumberTest extends TestCase
{

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function testPhoneNumberIsCorrect(): void {
        $string = "0632333435";
        $phoneNumber = new PhoneNumber($string);
        self::assertEquals($string, $phoneNumber);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testPhoneNumberIsIncorrect(): void {
        $this->expectException(InvalidValueObjectException::class);
        $string = "06 32 33 34";
        $phoneNumber = new \HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber($string);
    }

    public function testCreateFromStringPhoneNumberIsCorrect(): void {
        $string = "0632333435";
        $phoneNumber = \HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber::createFromString($string);
        self::assertEquals($string, $phoneNumber->getValue());
    }

    public function testCreateFromStringPhoneNumberIsIncorrect(): void {
        $this->expectException(InvalidValueObjectException::class);
        $string = "06 32 33 34";
        $phoneNumber = PhoneNumber::createFromString($string);
    }

    public function testGetValue(): void {
        $string = "0632333435";
        $phoneNumber = PhoneNumber::createFromString($string);
        self::assertEquals($string, $phoneNumber->getValue());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function testEqualsIsEqual(): void {
        $phoneNumber1 = \HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber::createFromString("0632333435");
        $phoneNumber2 = PhoneNumber::createFromString("0632333435");
        self::assertTrue($phoneNumber1->equals($phoneNumber2));
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function testEqualsIsNotEqual(): void {
        $phoneNumber1 = PhoneNumber::createFromString("0632333435");
        $phoneNumber2 = \HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber::createFromString("0632333437");
        self::assertFalse($phoneNumber1->equals($phoneNumber2));
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function testEqualsWithIncorrectParamType(): void
    {
        $this->expectException(\TypeError::class);
        $phoneNumber = \HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber::createFromString("0632333435");
        $dateTime = new \DateTime();
        $phoneNumber->equals($dateTime);
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function testEqualsWithIncorrectValueObjectParamType(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        $phoneNumber = \HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber::createFromString("0632333435");
        $username = new \HelloBees\SharedKernel\Domain\ValueObject\Identity\Username('foo', 'bar');
        $phoneNumber->equals($username);
    }

    public function testMagicToString(): void
    {
        $phoneNumber = \HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber::createFromString("0632333435");
        self::assertEquals("0632333435", $phoneNumber);
    }

}
