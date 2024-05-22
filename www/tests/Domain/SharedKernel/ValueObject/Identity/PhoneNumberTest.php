<?php

declare(strict_types=1);

namespace HelloBeesTest\Domain\SharedKernel\ValueObject\Identity;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\PhoneNumber;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Username;
use PHPUnit\Framework\TestCase;

/**
 * Class
 *
 * @class   PhoneNumberTest
 * @package HelloBeesTest\Domain\ValueObject\Map
 */
class PhoneNumberTest extends TestCase
{

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testPhoneNumberIsCorrect(): void {
        $string = "0632333435";
        $phoneNumber = new PhoneNumber($string);
        self::assertEquals($string, $phoneNumber);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testPhoneNumberIsIncorrect(): void {
        $this->expectException(InvalidValueObjectException::class);
        $string = "06 32 33 34";
        $phoneNumber = new PhoneNumber($string);
    }

    /**
     * @return void
     */
    public function testCreateFromStringPhoneNumberIsCorrect(): void {
        $string = "0632333435";
        $phoneNumber = PhoneNumber::createFromString($string);
        self::assertEquals($string, $phoneNumber->getValue());
    }

    /**
     * @return void
     */
    public function testCreateFromStringPhoneNumberIsIncorrect(): void {
        $this->expectException(InvalidValueObjectException::class);
        $string = "06 32 33 34";
        $phoneNumber = PhoneNumber::createFromString($string);
    }

    /**
     * @return void
     */
    public function testGetValue(): void {
        $string = "0632333435";
        $phoneNumber = PhoneNumber::createFromString($string);
        self::assertEquals($string, $phoneNumber->getValue());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsEqual(): void {
        $phoneNumber1 = PhoneNumber::createFromString("0632333435");
        $phoneNumber2 = PhoneNumber::createFromString("0632333435");
        self::assertTrue($phoneNumber1->equals($phoneNumber2));
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsNotEqual(): void {
        $phoneNumber1 = PhoneNumber::createFromString("0632333435");
        $phoneNumber2 = PhoneNumber::createFromString("0632333437");
        self::assertFalse($phoneNumber1->equals($phoneNumber2));
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectParamType(): void
    {
        $this->expectException(\TypeError::class);
        $phoneNumber = PhoneNumber::createFromString("0632333435");
        $dateTime = new \DateTime();
        $phoneNumber->equals($dateTime);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectValueObjectParamType(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        $phoneNumber = PhoneNumber::createFromString("0632333435");
        $username = new Username('foo', 'bar');
        $phoneNumber->equals($username);
    }

    /**
     * @return void
     */
    public function testMagicToString(): void
    {
        $phoneNumber = PhoneNumber::createFromString("0632333435");
        self::assertEquals("0632333435", $phoneNumber);
    }

}
