<?php

declare(strict_types=1);

namespace HelloBeesTest\Domain\SharedKernel\ValueObject\Identity;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Email;
use HelloBees\Domain\SharedKernel\ValueObject\Identity\Username;
use PHPUnit\Framework\TestCase;

/**
 * Class
 *
 * @class   EmailTest
 * @package HelloBeesTest\Domain\ValueObject\Map
 */
class EmailTest extends TestCase
{

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEmailIsCorrect(): void {
        $string = "anthony.graule@gmail.com";
        $email = new Email($string);
        self::assertEquals($string, $email->getValue());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEmailIsIncorrect(): void {
        $this->expectException(InvalidValueObjectException::class);
        $string = "anthony.graule";
        $email = new Email($string);
    }

    /**
     * @return void
     */
    public function testCreateFromStringEmailIsCorrect(): void {
        $string = "anthony.graule@gmail.com";
        $email = Email::createFromString($string);
        self::assertEquals($string, $email->getValue());
    }

    /**
     * @return void
     */
    public function testCreateFromStringEmailIsIncorrect(): void {
        $this->expectException(InvalidValueObjectException::class);
        $string = "anthony.graule";
        $email = Email::createFromString($string);
    }

    /**
     * @return void
     */
    public function testGetValue(): void {
        $string = "anthony.graule@gmail.com";
        $email = Email::createFromString($string);
        self::assertEquals($string, $email->getValue());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsEqual(): void {
        $email1 = Email::createFromString("anthony.graule@gmail.com");
        $email2 = Email::createFromString("anthony.graule@gmail.com");
        self::assertTrue($email1->equals($email2));
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsNotEqual(): void {
        $email1 = Email::createFromString("anthony.graule@gmail.com");
        $email2 = Email::createFromString("anthony.graule@yahoo.com");
        self::assertFalse($email1->equals($email2));
    }

    /**
     * @return void
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
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectValueObjectParamType(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        $email = Email::createFromString("anthony.graule@gmail.com");
        $username = new Username('foo', 'bar');
        $email->equals($username);
    }

    /**
     * @return void
     */
    public function testMagicToString(): void
    {
        $email = Email::createFromString("anthony.graule@gmail.com");
        self::assertEquals("anthony.graule@gmail.com", $email);
    }

    /**
     * @return void
     */
    public function testGetLocalPart(): void
    {
        $email = Email::createFromString("anthony.graule@gmail.com");
        self::assertEquals("anthony.graule", $email->getLocalPart()->getValue());
    }

    /**
     * @return void
     */
    public function testGetDomainPart(): void
    {
        $email = Email::createFromString("anthony.graule@gmail.com");
        self::assertEquals("gmail.com", $email->getDomainPart()->getValue());
    }

}
