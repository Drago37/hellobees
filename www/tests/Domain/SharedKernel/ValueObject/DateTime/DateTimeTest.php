<?php

declare(strict_types=1);

namespace HelloBeesTest\Domain\SharedKernel\ValueObject\DateTime;

use HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime;
use HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time;
use HelloBees\SharedKernel\Domain\ValueObject\LiteralString;
use PHPUnit\Framework\TestCase;

class DateTimeTest extends TestCase
{

    /**
     * @throws InvalidValueObjectException
     */
    public function testDateTimeIsCorrectWithTime(): void
    {
        $date = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date(2024, 1, 1);
        $time = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time(11, 55, 22);
        $dateTime = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime($date, $time);
        self::assertEquals('2024-01-01 11:55:22', $dateTime->toString());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function testDateTimeIsCorrectWithoutTime(): void
    {
        $date = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date(2024, 1, 1);
        $dateTime = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime($date);
        self::assertEquals('2024-01-01 00:00:00', $dateTime->toString());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function testCreateFromDateTime(): void
    {
        $dateTimeNative = new \DateTime();
        $dateTime = DateTime::createFromDateTime($dateTimeNative);
        self::assertEquals($dateTimeNative->format("Y-m-d H:i:s"), $dateTime->toString());
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testCreateFromTimestamp(): void
    {
        $dateTimeNative = new \DateTime();
        $dateTime = \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime::createFromTimestamp($dateTimeNative->getTimestamp());
        self::assertEquals($dateTimeNative->format("Y-m-d H:i:s"), $dateTime->toString());
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testNow(): void
    {
        $dateTimeNative = new \DateTime();
        $dateTime = \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime::now();
        self::assertEquals($dateTimeNative->format("Y-m-d H:i:s"), $dateTime->toString());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function testToNativeDatetime(): void
    {
        $dateTimeNative = \DateTime::createFromFormat("Y-m-d H:i:s", "2024-02-01 11:55:22");
        $date = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date(2024, 2, 1);
        $time = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time(11, 55, 22);
        $dateTimeNative2 = (new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime($date, $time))->toNativeDateTime();
        self::assertEquals($dateTimeNative, $dateTimeNative2);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testToTimestamp(): void
    {
        $dateTimeNative = \DateTime::createFromFormat("Y-m-d H:i:s", "2024-02-01 11:55:22");
        $date = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date(2024, 2, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime($date, $time);
        self::assertEquals($dateTimeNative->getTimestamp(), $dateTime->toTimestamp());
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testToStringWithDefaultSqlFormat(): void
    {
        $date = new Date(2024, 1, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime($date, $time);
        self::assertEquals("2024-01-01 11:55:22", $dateTime->toString());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function testToStringWithFrenchFormat(): void
    {
        $date = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date(2024, 1, 1);
        $time = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time(11, 55, 22);
        $dateTime = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime($date, $time);
        self::assertEquals("01/01/2024 11:55:22", $dateTime->toString(\HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime::FORMAT_FR));
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function testEqualsIsCorrect(): void
    {
        $date = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date(2024, 2, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime($date, $time);
        $date2 = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date(2024, 2, 1);
        $time2 = new Time(11, 55, 22);
        $dateTime2 = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime($date2, $time2);
        self::assertTrue($dateTime->equals($dateTime2));
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsIncorrect(): void
    {
        $date = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date(2024, 2, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime($date, $time);
        $date2 = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date(2027, 2, 27);
        $time2 = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time(11, 55, 22);
        $dateTime2 = new DateTime($date2, $time2);
        self::assertFalse($dateTime->equals($dateTime2));
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectParamType(): void
    {
        $this->expectException(\TypeError::class);
        $date = \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date::now();
        $time = \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Time::now();
        $dateTime = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime($date, $time);
        $dateTime2 = new \DateTime();
        $dateTime->equals($dateTime2);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectValueObjectParamType(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        $date = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date(2024, 2, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime($date, $time);
        $dateTime2 = new LiteralString('aaa');
        $dateTime->equals($dateTime2);
    }

    /**
     * @throws InvalidValueObjectException
     */
    public function testMagicToString(): void
    {
        $date = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\Date(2024, 1, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime($date, $time);
        self::assertEquals("01/01/2024 à 11:55:22", $dateTime);
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function testGetDate(): void
    {
        $date = new Date(2024, 2, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime($date, $time);
        self::assertEquals($date, $dateTime->getDate());
    }

    /**
     * @throws \HelloBees\SharedKernel\Domain\Exception\InvalidValueObjectException
     */
    public function testGetTime(): void
    {
        $date = new Date(2024, 2, 1);
        $time = new Time(11, 55, 22);
        $dateTime = new \HelloBees\SharedKernel\Domain\ValueObject\DateTime\DateTime($date, $time);
        self::assertEquals($time, $dateTime->getTime());
    }

}
