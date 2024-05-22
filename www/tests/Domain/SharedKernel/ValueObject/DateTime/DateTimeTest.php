<?php

declare(strict_types=1);

namespace Domain\SharedKernel\ValueObject\DateTime;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\Date;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\DateTime;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\Time;
use HelloBees\Domain\SharedKernel\ValueObject\LiteralString;
use PHPUnit\Framework\TestCase;

/**
 * Class
 *
 * @class   DateTimeTest
 * @package HelloBeesTest\Domain\ValueObject\DateTime
 */
class DateTimeTest extends TestCase
{

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testDateTimeIsCorrectWithTime(): void
    {
        $date = new Date(2024, 1, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new DateTime($date, $time);
        self::assertEquals('2024-01-01 11:55:22', $dateTime->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testDateTimeIsCorrectWithoutTime(): void
    {
        $date = new Date(2024, 1, 1);
        $dateTime = new DateTime($date);
        self::assertEquals('2024-01-01 00:00:00', $dateTime->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromDateTime(): void
    {
        $dateTimeNative = new \DateTime();
        $dateTime = DateTime::createFromDateTime($dateTimeNative);
        self::assertEquals($dateTimeNative->format("Y-m-d H:i:s"), $dateTime->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromTimestamp(): void
    {
        $dateTimeNative = new \DateTime();
        $dateTime = DateTime::createFromTimestamp($dateTimeNative->getTimestamp());
        self::assertEquals($dateTimeNative->format("Y-m-d H:i:s"), $dateTime->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testNow(): void
    {
        $dateTimeNative = new \DateTime();
        $dateTime = DateTime::now();
        self::assertEquals($dateTimeNative->format("Y-m-d H:i:s"), $dateTime->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testToNativeDatetime(): void
    {
        $dateTimeNative = \DateTime::createFromFormat("Y-m-d H:i:s", "2024-02-01 11:55:22");
        $date = new Date(2024, 2, 1);
        $time = new Time(11, 55, 22);
        $dateTimeNative2 = (new DateTime($date, $time))->toNativeDateTime();
        self::assertEquals($dateTimeNative, $dateTimeNative2);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testToTimestamp(): void
    {
        $dateTimeNative = \DateTime::createFromFormat("Y-m-d H:i:s", "2024-02-01 11:55:22");
        $date = new Date(2024, 2, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new DateTime($date, $time);
        self::assertEquals($dateTimeNative->getTimestamp(), $dateTime->toTimestamp());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testToStringWithDefaultSqlFormat(): void
    {
        $date = new Date(2024, 1, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new DateTime($date, $time);
        self::assertEquals("2024-01-01 11:55:22", $dateTime->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testToStringWithFrenchFormat(): void
    {
        $date = new Date(2024, 1, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new DateTime($date, $time);
        self::assertEquals("01/01/2024 11:55:22", $dateTime->toString(DateTime::FORMAT_FR));
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsCorrect(): void
    {
        $date = new Date(2024, 2, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new DateTime($date, $time);
        $date2 = new Date(2024, 2, 1);
        $time2 = new Time(11, 55, 22);
        $dateTime2 = new DateTime($date2, $time2);
        self::assertTrue($dateTime->equals($dateTime2));
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsIncorrect(): void
    {
        $date = new Date(2024, 2, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new DateTime($date, $time);
        $date2 = new Date(2027, 2, 27);
        $time2 = new Time(11, 55, 22);
        $dateTime2 = new DateTime($date2, $time2);
        self::assertFalse($dateTime->equals($dateTime2));
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectParamType(): void
    {
        $this->expectException(\TypeError::class);
        $date = Date::now();
        $time = Time::now();
        $dateTime = new DateTime($date, $time);
        $dateTime2 = new \DateTime();
        $dateTime->equals($dateTime2);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectValueObjectParamType(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        $date = new Date(2024, 2, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new DateTime($date, $time);
        $dateTime2 = new LiteralString('aaa');
        $dateTime->equals($dateTime2);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testMagicToString(): void
    {
        $date = new Date(2024, 1, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new DateTime($date, $time);
        self::assertEquals("01/01/2024 à 11:55:22", $dateTime);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testGetDate(): void
    {
        $date = new Date(2024, 2, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new DateTime($date, $time);
        self::assertEquals($date, $dateTime->getDate());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testGetTime(): void
    {
        $date = new Date(2024, 2, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new DateTime($date, $time);
        self::assertEquals($time, $dateTime->getTime());
    }

}
