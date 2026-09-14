<?php

declare(strict_types=1);

namespace HelloBeesTest\Domain\SharedKernel\ValueObject\Identity;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use PHPUnit\Framework\TestCase;

class UsernameTest extends TestCase
{

    public function testUsernameIsCorrect(): void {
        $username = new Username("john", "doe");
        self::assertEquals("john doe", $username);
    }

    public function testUsernameWithFirstnameIsIncorrect(): void {
        $this->expectException(InvalidValueObjectException::class);
        $username = new Username("", "doe");
    }

    public function testUsernameWithLastnameIsIncorrect(): void {
        $this->expectException(InvalidValueObjectException::class);
        $username = new \HelloBees\SharedKernel\Domain\ValueObject\Identity\Username("john", "");
    }

    public function testGetFirstName(): void {
        $username = new Username("john", "doe");
        self::assertEquals("john", $username->getFirstName());
    }

    public function testGetLastName(): void {
        $username = new Username("john", "doe");
        self::assertEquals("doe", $username->getLastName());
    }

    public function testGetFullName(): void {
        $username = new \HelloBees\SharedKernel\Domain\ValueObject\Identity\Username("john", "doe");
        self::assertEquals("john doe", $username->getFullName());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function testEqualsIsEqual(): void {
        $username1 = new Username("john", "doe");
        $username2 = new Username("john", "doe");
        self::assertTrue($username1->equals($username2));
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsNotEqual(): void {
        $username1 = new \HelloBees\SharedKernel\Domain\ValueObject\Identity\Username("john", "doe");
        $username2 = new \HelloBees\SharedKernel\Domain\ValueObject\Identity\Username("jean", "bon");
        self::assertFalse($username1->equals($username2));
    }

    /**
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
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectValueObjectParamType(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        $username = new \HelloBees\SharedKernel\Domain\ValueObject\Identity\Username("john", "doe");
        $phonenumber = new \HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber('0632333435');
        $username->equals($phonenumber);
    }

    public function testMagicToString(): void
    {
        $username = new Username("john", "doe");
        self::assertEquals("john doe", $username);
    }

}
