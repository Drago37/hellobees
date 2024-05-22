<?php

declare(strict_types=1);

namespace HelloBeesTest\Domain\SharedKernel\ValueObject\DateTime;

use HelloBees\Domain\SharedKernel\Exception\InvalidValueObjectException;
use HelloBees\Domain\SharedKernel\ValueObject\DateTime\Time;
use HelloBees\Domain\SharedKernel\ValueObject\LiteralString;
use PHPUnit\Framework\TestCase;

/**
 * Class
 *
 * @class   TimeTest
 * @package HelloBeesTest\Domain\ValueObject\DateTime
 */
class TimeTest extends TestCase
{
    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testTimeIsCorrect(): void
    {
        $date = new Time(23, 59, 01);
        self::assertEquals('23:59:01', $date->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testTimeWithIncorrectHour(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new Time(25, 59, 01);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testTimeWithIncorrectMinute(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new Time(23, 68, 01);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testTimeWithIncorrectSecond(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        new Time(23, 59, 61);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromDateTime(): void
    {
        $datetime = new \DateTime();
        $time = Time::createFromDateTime($datetime);
        self::assertEquals($datetime->format('H:i:s'), $time->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromStringWithFullFormat(): void
    {
        $time = Time::createFromString('11:30:25');
        self::assertEquals('11:30:25', $time->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromStringWithHourMinuteFormat(): void
    {
        $time = Time::createFromString('11:30', Time::FORMAT_HOURS_MINUTES);
        self::assertEquals('11:30:00', $time->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromStringWithIncorrectTime(): void
    {
        $this->expectException(InvalidValueObjectException::class);
        Time::createFromString('11:99:25');
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromTimestamp(): void
    {
        $datetime = new \DateTime();
        $time = Time::createFromTimestamp($datetime->getTimestamp());
        self::assertEquals($datetime->format('H:i:s'), $time->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testCreateFromDateInterval(): void
    {
        $dateInterval = new \DateInterval("PT2H8M22S"); // 02:08:22
        $time = Time::createFromDateInterval($dateInterval);
        self::assertEquals($dateInterval->format('%H:%I:%s'), $time->toString());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testNow() : void {
        $time = new Time(5,10,15);
        self::assertEquals(
            (new \DateTime())->format(Time::FORMAT_HOURS_MINUTES_SECONDS),
            $time->now()->toString()
        );
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testToStringWithDefaultFormat() : void {
        $time = new Time(5,10,15);
        self::assertEquals(
            "05:10:15",
            $time->toString()
        );
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testToStringWithHourMinutesFormat() : void {
        $time = new Time(5,10,15);
        self::assertEquals(
            "05:10",
            $time->toString(Time::FORMAT_HOURS_MINUTES)
        );
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsCorrect() : void {
        $time1 = new Time(5,10,15);
        $time2 = new Time(5,10,15);
        self::assertTrue($time1->equals($time2));
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsIsIncorrect() : void {
        $time1 = new Time(5,10,15);
        $time2 = new Time(7,10,15);
        self::assertFalse($time1->equals($time2));
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectParamType() : void {
        $this->expectException(\TypeError::class);
        $time = new Time(5,10,15);
        $time2 = new \DateTime();
        $time->equals($time2);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testEqualsWithIncorrectValueObjectParamType() : void {
        $this->expectException(InvalidValueObjectException::class);
        $time = new Time(5,10,15);
        $time2 = new LiteralString('aaa');
        $time->equals($time2);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testMagicToString() : void {
        $time = new Time(5,10,15);
        self::assertEquals($time->toString(), $time);
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testGetHour() : void {
        $time = new Time(5,10,15);
        self::assertEquals(5, $time->getHour());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testGetMinute() : void {
        $time = new Time(5,10,15);
        self::assertEquals(10, $time->getMinute());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testGetSecond() : void {
        $time = new Time(5,10,15);
        self::assertEquals(15, $time->getSecond());
    }

    /**
     * @return void
     * @throws InvalidValueObjectException
     */
    public function testZero() : void {
        $time = new Time(5,10,15);
        self::assertEquals("00:00:00", $time->zero()->toString());
    }

}
