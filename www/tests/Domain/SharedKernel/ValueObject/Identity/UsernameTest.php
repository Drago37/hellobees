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
 * @class   UsernameTest
 * @package HelloBeesTest\Domain\ValueObject\Map
 */
class UsernameTest extends TestCase
{

    /**
     * @return void
     */
    public function testUsernameIsCorrect(): void {
        $username = new Username("john", "doe");
        self::assertEquals("john doe", $username);
    }

    /**
     * @return void
     */
    public function testUsernameWithFirstnameIsIncorrect(): void {
        $this->expectException(InvalidValueObjectException::class);
        $username = new Username("", "doe");
    }

    /**
     * @return void
     */
    public function testUsernameWithLastnameIsIncorrect(): void {
        $this->expectException(InvalidValueObjectException::class);
        $username = new Username("john", "");
    }

    /**
     * @return void
     */
    public function testGetFirstName(): void {
        $username = new Username("john", "doe");
        self::assertEquals("john", $username->getFirstName());
    }

    /**
     * @return void
     */
    public function testGetLastName(): void {
        $username = new Username("john", "doe");
        self::assertEquals("doe", $username->getLastName());
    }

    /**
     * @return void
     */
    public function testGetFullName(): void {
        $username = new Username("john", "doe");
        self::assertEquals("john doe", $username->getFullName());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsEqual(): void {
        $username1 = new Username("john", "doe");
        $username2 = new Username("john", "doe");
        self::assertTrue($username1->equals($username2));
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsNotEqual(): void {
        $username1 = new Username("john", "doe");
        $username2 = new Username("jean", "bon");
        self::assertFalse($username1->equals($username2));
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectParamType(): void
    {
        $this->expectException(\TypeError::class);
        $username = new Username("john", "doe");
        $dateTime = new \DateTime();
        $username->equals($dateTime);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectValueObjectParamType(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        $username = new Username("john", "doe");
        $phonenumber = new PhoneNumber('0632333435');
        $username->equals($phonenumber);
    }

    /**
     * @return void
     */
    public function testMagicToString(): void
    {
        $username = new Username("john", "doe");
        self::assertEquals("john doe", $username);
    }

}
