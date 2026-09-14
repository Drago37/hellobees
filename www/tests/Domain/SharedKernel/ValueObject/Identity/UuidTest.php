<?php

declare(strict_types=1);

namespace HelloBeesTest\Domain\SharedKernel\ValueObject\Identity;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\PhoneNumber;
use HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid;
use PHPUnit\Framework\TestCase;

/**
 * Class
 *
 * @class   UuidTest
 * @package HelloBeesTest\Domain\ValueObject\Map
 */
class UuidTest extends TestCase
{

    private const UUID_EXAMPLE = "998fd066-c786-4064-9c98-e378e450cd4a";
    private const UUID_VALID_PATTERN = '/\A[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}\z/';

    /**
     * @return void
     */
    public function testUuidIsCorrect(): void {
        $uuid = new Uuid(static::UUID_EXAMPLE);
        self::assertEquals(static::UUID_EXAMPLE, $uuid);
    }

    /**
     * @return void
     */
    public function testUuidIsIncorrect(): void {
        $this->expectException(InvalidValueObjectException::class);
        $uuid = new Uuid("123");
    }

    /**
     * @return void
     */
    public function testCreateFromStringIsCorrect(): void {
        $uuid = Uuid::createFromString(static::UUID_EXAMPLE);
        self::assertEquals(static::UUID_EXAMPLE, $uuid);
    }

    /**
     * @return void
     */
    public function testCreateFromStringIsIncorrect(): void {
        $this->expectException(InvalidValueObjectException::class);
        $uuid = \HelloBees\SharedKernel\Domain\ValueObject\Identity\Uuid::createFromString("123");
    }

    /**
     * @return void
     */
    public function testGetValue(): void {
        $uuid = Uuid::createFromString(static::UUID_EXAMPLE);
        self::assertEquals(static::UUID_EXAMPLE, $uuid->getValue());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testEqualsIsEqual(): void {
        $uuid1 = Uuid::createFromString(static::UUID_EXAMPLE);
        $uuid2 = Uuid::createFromString(static::UUID_EXAMPLE);
        self::assertTrue($uuid1->equals($uuid2));
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testEqualsIsNotEqual(): void {
        $uuid1 = Uuid::createFromString(static::UUID_EXAMPLE);
        $uuid2 = Uuid::createFromString("198fd066-c786-4064-9c98-e378e450cd4a");
        self::assertFalse($uuid1->equals($uuid2));
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testEqualsWithIncorrectParamType(): void
    {
        $this->expectException(\TypeError::class);
        $uuid = Uuid::createFromString(static::UUID_EXAMPLE);
        $dateTime = new \DateTime();
        $uuid->equals($dateTime);
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     *@return void
     */
    public function testEqualsWithIncorrectValueObjectParamType(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        $uuid = Uuid::createFromString(static::UUID_EXAMPLE);
        $phonenumber = new PhoneNumber('0632333435');
        $uuid->equals($phonenumber);
    }

    /**
     * @return void
     */
    public function testMagicToString(): void
    {
        $uuid = Uuid::createFromString(static::UUID_EXAMPLE);
        self::assertEquals(static::UUID_EXAMPLE, $uuid);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testGenerate(): void
    {
        $uuid = Uuid::generate();
        self::assertMatchesRegularExpression(static::UUID_VALID_PATTERN, $uuid->getValue());
    }

}
