<?php

declare(strict_types=1);

namespace HelloBeesTest\Domain\SharedKernel\ValueObject\Identity;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Email;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Username;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{

    /**
     * @throws InvalidValueObjectException
     */
    public function testEmailIsCorrect(): void {
        $string = "anthony.graule@gmail.com";
        $email = new \HelloBees\SharedKernel\Domain\ValueObject\Identity\Email($string);
        self::assertEquals($string, $email->getValue());
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testEmailIsIncorrect(): void {
        $this->expectException(InvalidValueObjectException::class);
        $string = "anthony.graule";
        $email = new Email($string);
    }

    public function testCreateFromStringEmailIsCorrect(): void {
        $string = "anthony.graule@gmail.com";
        $email = Email::createFromString($string);
        self::assertEquals($string, $email->getValue());
    }

    public function testCreateFromStringEmailIsIncorrect(): void {
        $this->expectException(InvalidValueObjectException::class);
        $string = "anthony.graule";
        $email = \HelloBees\SharedKernel\Domain\ValueObject\Identity\Email::createFromString($string);
    }

    public function testGetValue(): void {
        $string = "anthony.graule@gmail.com";
        $email = \HelloBees\SharedKernel\Domain\ValueObject\Identity\Email::createFromString($string);
        self::assertEquals($string, $email->getValue());
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsEqual(): void {
        $email1 = Email::createFromString("anthony.graule@gmail.com");
        $email2 = Email::createFromString("anthony.graule@gmail.com");
        self::assertTrue($email1->equals($email2));
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsNotEqual(): void {
        $email1 = Email::createFromString("anthony.graule@gmail.com");
        $email2 = Email::createFromString("anthony.graule@yahoo.com");
        self::assertFalse($email1->equals($email2));
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectParamType(): void
    {
        $this->expectException(\TypeError::class);
        $email = Email::createFromString("anthony.graule@gmail.com");
        $dateTime = new \DateTime();
        $email->equals($dateTime);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectValueObjectParamType(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        $email = Email::createFromString("anthony.graule@gmail.com");
        $username = new Username('foo', 'bar');
        $email->equals($username);
    }

    public function testMagicToString(): void
    {
        $email = Email::createFromString("anthony.graule@gmail.com");
        self::assertEquals("anthony.graule@gmail.com", $email);
    }

    public function testGetLocalPart(): void
    {
        $email = Email::createFromString("anthony.graule@gmail.com");
        self::assertEquals("anthony.graule", $email->getLocalPart()->getValue());
    }

    public function testGetDomainPart(): void
    {
        $email = Email::createFromString("anthony.graule@gmail.com");
        self::assertEquals("gmail.com", $email->getDomainPart()->getValue());
    }

}
